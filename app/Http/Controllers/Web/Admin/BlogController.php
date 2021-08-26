<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
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
        return view('admin.blog.create');
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'slug' => ['required'],
            'body' => ['required'],
            'feature_image' => ['required']
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect ::back()->withInput();
        }

        if($request->hasFile('feature_image')){
            $image = $request->file('feature_image');
            $filename = time() .'.'. $image->getClientOriginalExtension();
            $photo  = Image::make($image->getRealPath())->save(public_path('images/blog/'.$filename));
            // $photo = Image::make($avatar)->resize(307, 146)->save(public_path('images/category/'.$filename));

            $fileName = 'images/blog/'.$filename;
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Feature Image is requried.');
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->body = $request->body;
        $blog->feature_image = $fileName;

        if($blog->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Post created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.blog');
    }
}
