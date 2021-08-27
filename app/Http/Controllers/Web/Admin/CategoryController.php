<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Validator;
use Redirect;
use Image;


class CategoryController extends Controller
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
        // $d_guy = false;
        $title = "Categories";
        $subTitle = "Tour Categories";
        $categories = Category::all();
        return view('admin.category.index', compact('categories', 'title', 'subTitle'));
    }

    public function showForm()
    {
        return view('admin.category.create');
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
            $photo  = Image::make($avatar->getRealPath())->save(public_path('images/category/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/category/'.$filename;
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Category Image is requried.');
        }

        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->subtitle = $request->subtitle;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->image = $fileName;

        if($category->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Category created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.category');
    }

    public function edit($id)
    {
        // dd($id);
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function delete($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $image = $category->image;
        if($category->delete()){
            unlink($image);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Category deleted successfully.');
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
        
        $category = Category::findOrFail($id);
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->subtitle = $request->subtitle;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;

        if($request->hasFile('img')){
            unlink($category->image);
            $avatar = $request->file('img');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            $photo  = Image::make($avatar->getRealPath())->save(public_path('images/category/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/category/'.$filename;
            $category->image = $fileName;
        }

        if($category->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Category created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.category');
    }
}
