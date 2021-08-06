<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

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
        $d_guy = false;
        $title = "Categories";
        $subTitle = "Tour Categories";
        $categories = Category::all();
        return view('admin.user.index', compact('categories', 'title', 'subTitle', 'd_guy'));
    }

    public function delete($id)
    {
        dd('deletd '.$id);
    }
}
