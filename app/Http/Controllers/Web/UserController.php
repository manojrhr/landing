<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository as UserRepo;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show_profile()
    {
        return view('web.user.profile');
    }

    public function edit_profile()
    {
        return view('web.user.edit-profile');
    }

    public function update_profile(Request $request)
    {
        $response_array = UserRepo::update($request);
        if($response_array['success'] === true){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Profile updated successfully!');
        } else {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', $response_array['message']);
        }
        return redirect('/user/profile');
        // return view('web.user.profile');
    }
}
