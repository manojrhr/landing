<?php

namespace App\Http\Controllers\Web;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $category = Category::where('slug', 'transfers')->first();
        $subcategories = SubCategory::where('category_id', $category->id)->get();
        // dd($subcategories->isEmpty());
        return view('web.transfers.index', compact('subcategories'));
    }

    public function transfers($slug)
    {
        if($slug != 'airport-transfers')
            abort(404);
        return view('web.transfers.airport');
    }
}
