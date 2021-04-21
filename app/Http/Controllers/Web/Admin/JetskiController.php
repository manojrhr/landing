<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JetSki;
use Redirect;

class JetskiController extends Controller
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
        $jetskis = JetSki::all();
        return view('admin.jetski.index', compact('jetskis'));
    }
    

    public function delete($id, Request $request)
    {
        $user = JetSki::findOrFail($id);
        $user->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Jet Ski Deleted Successfully.');
        return Redirect::back();
    }
}
