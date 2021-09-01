<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\ContactFormSubmitted;
use App\User;
use App\Admin;
use App\Category;
use Validator;
use Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all()->take(3);
        return view('web.home', compact('categories'));
    }

    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max: 255',
            'email' => 'required|email|max: 255',
            'message' => 'required',
        ],[
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute must be a valid :attribute address'
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $response_array = ['status' => false , 'message' => $validator->messages()->all(), 'error_code' => 101];
            return response()->json($response_array);
        }
        
        $admins = Admin::all();
        Notification::send($admins, new ContactFormSubmitted($request));
        $response_array = ['status' => true , 'message' => 'Thank you for contacting us.', 'error_code' => 101];
        return response()->json($response_array, 201);
        // dd($request->all());
    }
}
