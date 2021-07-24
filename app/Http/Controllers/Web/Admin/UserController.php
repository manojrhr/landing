<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\DeliverGuyActivated;
use App\User;
use Redirect;
use Notification;
use Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = User::all();
        $d_guy = false;
        $title = "Customers";
        $subTitle = "Registered Customers";
        $users = User::where('delivery_guy', false)->latest()->get();
        return view('admin.user.index', compact('users', 'title', 'subTitle', 'd_guy'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dlivery_guy()
    {
        // $users = User::all();
        $d_guy = true;
        $title = "Delivery Guys";
        $subTitle = "Registered Delivery Guys";
        $users = User::where('delivery_guy', true)->latest()->get();
        return view('admin.user.index', compact('users', 'title', 'subTitle', 'd_guy'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function single($id)
    {
        $user = User::findOrFail($id);

        $title = $user->delivery_guy ? "Delivery Guys" : "Customer";
        $subTitle = $title. " Profile";
        return view('admin.user.single', compact('user', 'title', 'subTitle'));
    }

    public function updateDetails(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
    		'name' => 'required|string',
    		'email' => 'string|email|unique:users,email,'.$id,
            'phone' => ['required', 'numeric', 'min:10'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($user->save())
        {
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'User Deleted Successfully.');
        } else {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'User Deleted Successfully.');
        }
        return Redirect::back();
    }

    public function updatePassword(Request $request, $id)
    {
        dump($id);
        dd($request->all());
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'User Deleted Successfully.');
        return Redirect::back();
    }

    public function change_status($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->toggleVerification()->save();
        if($user->verified){
            // dump('here');
            // $user->notify(new DeliverGuyActivated($user));
            Notification::send($user, new DeliverGuyActivated($user));
        }
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'User Status Changed Successfully.');
        return Redirect::back();
    }

    public function delete($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'User Deleted Successfully.');
        return Redirect::back();
    }
}
