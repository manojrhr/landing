<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Make;
use App\Models;
use Validator;
use Redirect;

class MakeController extends Controller
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
        $makes = Make::all();
        return view('admin.make.index', compact('makes'));
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|unique:makes',
		]);
		
        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return redirect()->route('admin.makes');
        }
        
        $make = new Make;
        $make->name = $request->name;
        $make->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Make Added Successfully');
        return redirect::back();
    }

    
    public function delete($id, Request $request)
    {
        $make = Make::findOrFail($id);
        $make->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Make Deleted Successfully.');
        return Redirect::back();
    }

    public function single($id)
    { 
        $make = Make::findOrFail($id);
        // echo $make->name;
        return view('admin.make.single', compact('make'));
    }

    public function storeModel($id, Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required|unique:makes',
		]);
		
        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return redirect()->route('admin.makes');
        }
        $make = Make::findOrFail($id);
        $model = $request->all();
        $make->models()->save(new Models($model));
    
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Model Created Successfully.');
        return Redirect::back();
    }
    
    public function deleteModel($id, Request $request)
    {
        $model = Models::findOrFail($id);
        $model->delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Make Deleted Successfully.');
        return Redirect::back();
    }
}
