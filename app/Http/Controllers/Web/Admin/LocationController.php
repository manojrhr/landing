<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Location;
use Illuminate\Http\Request;
use Redirect;
use Validator;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index($id = null)
    {
        if($id === null) {
            $location = new Location();
        } else {
            $location = Location::findOrFail($id);
        }
        $title = "Locations";
        $subTitle = "Tour Locations";
        $locations = Location::all();
        return view('admin.location.index', compact('location','locations','title','subTitle'));
    }

    public function create(Request $request)
    {
        // dd($request->name);
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);
        if ($validator->fails()) 
        {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }

        $location = new Location();
        $location->name = ucfirst($request->name);
        $location->name = str_slug($request->name);

        if($location->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Location created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);
        if ($validator->fails()) 
        {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }

        $location = Location::findOrFail($id);
        $location->name = ucfirst($request->name);
        $location->name = str_slug($request->name);

        if($location->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Location updated successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }

}
