<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use App\BlogCategory;
use Validator;
use Redirect;
use Image;

class BlogController extends Controller
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

    public function index()
    {
        $title = "Blog Posts";
        $subTitle = "";
        $posts = Blog ::all();
        return view('admin.blog.index', compact('posts', 'title', 'subTitle'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'slug' => ['required'],
            'body' => ['required'],
            'feature_image' => ['required'],
            'category_id' => ['required']
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect ::back()->withInput();
        }

        $blog = new Blog();
        if($request->hasFile('feature_image')){
            $image = $request->file('feature_image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            $photo  = Image::make($image->getRealPath())->save(public_path('images/blog/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/blog/'.$filename;
            $blog->feature_image = $fileName;
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Feature Image is requried.');
        }

        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->body = $request->body;
        $blog->blog_category_id = $request->category_id;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        if($blog->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Post created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.blog');
    }

    public function edit($id)
    {
        // dd($id);
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }
    
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'slug' => ['required'],
            'body' => ['required'],
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect ::back()->withInput();
        }

        $blog = Blog::findOrFail($id);
        $image = $blog->feature_image;
        if($request->hasFile('feature_image')){
            if(file_exists($image)){
                unlink($image);
            }
            $image = $request->file('feature_image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            $photo  = Image::make($image->getRealPath())->save(public_path('images/blog/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/blog/'.$filename;
            $blog->feature_image = $fileName;
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Feature Image is requried.');
        }

        // $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->body = $request->body;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        if($blog->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Post created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.blog');
    }
    
    public function delete($id, Request $request)
    {
        $blog = Blog::findOrFail($id);
        $image = $blog->image;
        if($blog->delete()){
            if(file_exists($image)){
                unlink($image);
            }
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Category deleted successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }
}