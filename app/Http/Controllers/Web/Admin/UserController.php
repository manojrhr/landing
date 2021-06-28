<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Redirect;
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
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function single($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.single', compact('user'));
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

    public function delete($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'User Deleted Successfully.');
        return Redirect::back();
    }
}
