<?php

namespace App\Http\Controllers\Web;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('web.blog.blog', compact('blogs'));
    }

    public function single($slug)
    {
        $post = Blog::where('slug', $slug)->first();
        if(!$post){
            abort(404);
        }
        return view('web.blog.single', compact('post'));
    }
}
