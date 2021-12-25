<?php

namespace App\Http\Controllers;

use App\Address;
use App\Admin;
use App\Booking;
use App\Http\Requests;
use App\Notifications\AdminNewBookingNotification;
use App\Notifications\CustomerOrderBookedSuccess;
use App\User;
use Illuminate\Http\Request;
use Validator;
use URL;
use Auth;
use Hash;
use Notification;
use Session;
use Redirect;
use Input;
use Symfony\Component\Console\Input\Input as Inpt;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $_api_context;
    
    public function __construct()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function payWithPaypal()
    {
        $booking = (object)$request->session()->get('booking')[0];
        // dd($booking);
        // $tour = Booking::where('booking_id', $booking_id)->firstOrFail();
        $tour = Tour::finOrFail($booking->tour_id);
        return view('checkout', $tour->slug);
    }

    public function postPaymentWithpaypal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'min:10'],
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back()->withInput();
        }
        if (Auth::check()) {
            $userCheck = Auth::user();
        } else {
            $userCheck = User::where('email', $request->email)->first();
        }

        if(!$userCheck){
            if($request->has('createaccount') && $request->createaccount === "1"){
                if($request->has('password')){
                    $password = $request->password;
                } else {
                    $password = sha1(time());
                }
            } else {
                $password = sha1(time());
            }

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($password)
            ]);
        } else {
            $user = $userCheck;
        }
        Auth::loginUsingId($user->id);

        $address = new Address();
        $address->company = $request->company;
        $address->country_id = $request->country;
        $address->address_1 = $request->address_1;
        $address->address_2 = $request->address_2;
        $address->city = $request->city;
        $address->postal_code = $request->postcode;
        $address->phone = $user->phone;
        $address->user_id = $user->id;
        $address->save();

        if($request->payment_method === "paypal"){
            $cod = 0;
        } else {
            $cod = 1;
        }

        $latest_booking = Booking::latest()->first();
        if($latest_booking){
            $booking_id = $latest_booking->booking_id + 1;
        } else {
            $booking_id = 10001;
        }
        $booking = $request->booking;
        $booking['booking_id'] = $booking_id;
        $booking['user_id'] = $user->id;
        $booking['address_id'] = $address->id;
        $booking = Booking::create($booking);

        $request->session()->put('booking_id', $booking->booking_id);
        if($cod) {
            $booking->is_cod = 1;
            $booking->save();
            // $booking = Booking::where('booking_id', $booking->booking_id)->first();
            // $tour_slug = $request->session()->put('tour_slug');
            // $request->session()->put('tour_slug', $tour_slug);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Payment success !!');
            $user->notify((new CustomerOrderBookedSuccess($booking)));
            $admins = Admin::all();
            Notification::send($admins, new AdminNewBookingNotification($booking));
            return Redirect::route('paymentSuccess');
        }
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName('Booking #'.$booking->booking_id)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($booking->total_amount);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($booking->total_amount);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Payment for booking #'.$booking->booking_id);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::back();
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::back();
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        // Session::put('paypal_payment_id', $payment->getId());
        $request->session()->put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {            
            return Redirect::away($redirect_url);
        }

        $request->session()->flash('message.level', 'error');
        $request->session()->flash('message.content', 'Unknown error occurred');
        // \Session::put('error','Unknown error occurred');
    	return Redirect::back();
    }

    public function getPaymentStatus(Request $request)
    {
        if($request->has('token') && !$request->has('paymentId')){
            $booking = Booking::where('token',$request->token)->first();
            $tour_slug = $booking->tour->slug;
            $request->session()->put('tour_slug', $tour_slug);
            if($booking){
                return Redirect::route('paymentSuccess');
            } else {
                abort(404);
            }
        }
        $slug = $request->session()->get('tour_slug');
        $payment_id = $request->session()->get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Payment failed');
            return Redirect::route('checkout', $slug);
        }
        $payment = Payment::get($payment_id, $this->_api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));        
        $result = $payment->execute($execution, $this->_api_context);
        
        if ($result->getState() == 'approved') {
            $booking_id = $request->session()->get('booking_id');
            $booking = Booking::where('booking_id', $booking_id)->firstOrFail();
            $booking->amount_charged = $result->transactions[0]->amount->total;
            $booking->payment_id = $request->paymentId;
            $booking->token = $request->token;
            $booking->payer_id = $request->PayerID;
            $booking->payment_status = $result->getState();
            $booking->save();
            $user = $booking->user;
            $user->notify((new CustomerOrderBookedSuccess($booking)));
            $admins = Admin::all();
            Notification::send($admins, new AdminNewBookingNotification($booking));
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Payment success !!');
            return Redirect::route('paymentSuccess');
        }

        $request->session()->flash('message.level', 'error');
        $request->session()->flash('message.content', 'Payment failed !!');
		return Redirect::route('paymentSuccess');
    }
}