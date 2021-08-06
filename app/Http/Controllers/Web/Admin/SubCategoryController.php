<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use Validator;
use Redirect;
use Image;


class SubCategoryController extends Controller
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
        $title = "Sub Categories";
        $subTitle = "Tour Sub Categories";
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', compact('subcategories', 'title', 'subTitle', 'd_guy'));
    }

    public function showForm()
    {
        return view('admin.subcategory.create');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'subtitle' => ['required'],
        ]);
        if ($validator->fails()) {

            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
            // return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }
        
        if($request->hasFile('img')){
            $avatar = $request->file('img');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            $photo  = Image::make($avatar->getRealPath())->resize(307, 146, function($constraint)
            {
                $constraint->aspectRatio();
            })->save(public_path('images/subcategory/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/subcategory/'.$filename;
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'SubCategory Image is requried.');
        }

        $subcategory = new SubCategory();
        $subcategory->title = $request->title;
        $subcategory->subtitle = $request->subtitle;
        $subcategory->slug = str_slug($request->title);
        $subcategory->image = $fileName;

        if($subcategory->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'SubCategory created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }

    public function edit($id)
    {
        // dd($id);
        $subcategory = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    public function delete($id, Request $request)
    {
        $subcategory = SubCategory::findOrFail($id);
        if($subcategory->delete()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'SubCategory created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }

    public function update($id, Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'subtitle' => ['required'],
        ]);
        if ($validator->fails()) 
        {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }
        
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->title = $request->title;
        $category->subtitle = $request->subtitle;
        $subcategory->slug = str_slug($request->title);

        if($request->hasFile('img')){
            unlink($subcategory->image);
            $avatar = $request->file('img');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            $photo  = Image::make($avatar->getRealPath())->resize(307, 146, function($constraint)
            {
                $constraint->aspectRatio();
            })->save(public_path('images/subcategory/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/subcategory/'.$filename;
            $subcategory->image = $fileName;
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'SubCategory Image is requried.');
        }

        if($subcategory->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'SubCategory created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    




        $subcategory = SubCategory::findOrFail($id);
        if($subcategory->delete()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Category created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }
}
