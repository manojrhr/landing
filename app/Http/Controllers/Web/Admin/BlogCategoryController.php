<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlogCategory;
use Validator;
use Redirect;
use Image;

class BlogCategoryController extends Controller
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
        $title = "Blog Categories";
        $subTitle = "Blog Post Categories";
        $categories = BlogCategory::all();
        return view('admin.blogcategory.index', compact('categories', 'title', 'subTitle'));
    }

    public function showForm()
    {
        return view('admin.blogcategory.create');
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
            $photo  = Image::make($avatar->getRealPath())->save(public_path('images/blogcategory/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/blogcategory/'.$filename;
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Category Image is requried.');
        }

        $category = new BlogCategory();
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
        return redirect()->route('admin.blogcategory');
    }

    public function edit($id)
    {
        // dd($id);
        $category = BlogCategory::findOrFail($id);
        return view('admin.blogcategory.edit', compact('category'));
    }

    public function delete($id, Request $request)
    {
        $category = BlogCategory::findOrFail($id);
        $image = $category->image;
        if($category->delete()){
            if(file_exists(public_path().$image)){
                unlink($image);
            }
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Category created successfully.');
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
        
        $category = BlogCategory::findOrFail($id);
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->subtitle = $request->subtitle;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        
        if($request->hasFile('img')){
            $image = $category->image;
            if(file_exists($image)){
                unlink($image);
            }
            $avatar = $request->file('img');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            $photo  = Image::make($avatar->getRealPath())->save(public_path('images/blogcategory/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/blogcategory/'.$filename;
            $category->image = $fileName;
        }
        
        if($category->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Category created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.blogcategory');
    }
}
