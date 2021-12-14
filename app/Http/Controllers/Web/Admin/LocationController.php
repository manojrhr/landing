<?php

namespace App\Http\Controllers\Web\Admin;

use App\AirportTransfer;
use App\Http\Controllers\Controller;
use App\Location;
use App\TourOption;
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

    public function showform()
    {
        return $this->edit(new Location());
    }

    public function edit(Location $location)
    {
        return view('admin.location.edit', compact('location'));
    }

    public function create(Request $request)
    {
        // dd($request->name);
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            // 'address' => ['required','string'],
            'city' => ['required','string'],
            // 'zip' => ['integer'],
            // 'lat' => ['string'],
            // 'long' => ['string'],
        ]);
        if ($validator->fails()) 
        {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }

        $location = new Location();
        $location->name = $request->name;
        $location->slug = $request->slug;
        $location->city = $request->city;
        if($request->has('address'))
        {
            $location->address = $request->address;
        }
        if($request->has('zip'))
        {
            $location->zip = $request->zip;
        }
        if($request->has('lat'))
        {
            $location->lat = $request->lat;
        }
        if($request->has('long'))
        {
            $location->long = $request->long;
        }

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
            // 'address' => ['required','string'],
            'city' => ['required','string'],
            // 'zip' => ['integer'],
            // 'lat' => ['string'],
            // 'long' => ['string'],
        ]);
        if ($validator->fails()) 
        {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }

        $location = Location::findOrFail($id);
        $location->name = $request->name;
        $location->slug = $request->slug;
        $location->city = $request->city;
        if($request->has('address'))
        {
            $location->address = $request->address;
        }
        if($request->has('zip'))
        {
            $location->zip = $request->zip;
        }
        if($request->has('lat'))
        {
            $location->lat = $request->lat;
        }
        if($request->has('long'))
        {
            $location->long = $request->long;
        }

        if($location->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Location updated successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }

    public function delete($id, Request $request)
    {
        $location = Location::findOrFail($id);
        $tour_option = TourOption::where('location_id', $location->id)->delete();
        $airport_transfer = AirportTransfer::where('location_id', $location->id)->delete();
        if($location->delete()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Location deleted successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }

    public function toggleActive(Location $location, Request $request)
    {
        $location->active= !$location->active;
        $location->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Status Changed');
        return Redirect::back();
    }
}
