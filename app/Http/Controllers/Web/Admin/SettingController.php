<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Redirect;
use Hash;
use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->middleware('auth:admin');
    }

    public function getEmailUpdate(Request $request)
    {
        return view('admin.setting.emailupdate');
    }

	public function updateAdminEmail(Request $request)
	{
		$user = Auth::user();
		$user->email = $request->email;
		$user->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Email changed successfully.');
        return Redirect::back();
		
	}


    public function getChangePassword()
    {
        return view('admin.setting.changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        if(!Hash::check($request->current_password, Auth::user()->password))
        {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Current Password not matched');
        }
   
        $user = Auth::user();
        $user->update(['password'=> Hash::make($request->new_password)]);
   
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Password changed successfully.');
        return Redirect::back();
    }
    public function maintenance(){
        $app = $this->app;
        return view('admin.setting.maintenance', compact('app'));
    }
    public function MaintenanceMode(Request $request){
        $app = $this->app;
        if ($this->app->isDownForMaintenance()) {
          //maintenance_message
        //   Session::flash('danger', 'Site is successfully in maintenance mode.');
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Maintenance Mode Off');
           Artisan::call('up');
        }else{
          //maintenance_message
        //   Session::flash('success', 'Site is ONLINE.');
          $request->session()->flash('message.level', 'danger');
          $request->session()->flash('message.content', 'Maintenance Mode On');
        Artisan::call('down');
        }
        return Redirect::back();
      }
}
