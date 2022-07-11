<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Redirect;
use App\Pages;
use App\Images;
use App\Details;

class LandingController extends Controller
{
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
        return view('admin.landing.index');
    }

    public function create()
    {
        return view('admin.landing.create');
    }

    public function add(Request $request)
    {
        $landing = new Pages();
        $landing->page_name = $request->page_name;
        $landing->price = $request->price;
        $landing->actual_price = $request->actual_price;
        $landing->slug = $request->slug;
        $landing->phone = $request->phone;
        $landing->email = $request->email;
        $landing->save();

        
        foreach ($request->img as $key => $value) {
            // Images::create($value);..
            $imgName = $value['name'].'-'.time();
            $imageName = $imgName.'.'.$value['image']->getClientOriginalExtension();
            $value['image']->move(public_path('/product_images'), $imageName);

            // $value = request($value['name']) . ' ' . time();
            $slug = Str::slug($imgName);
            $image = new Images();
            $image->name = $imgName;
            $image->slug = $slug;
            $image->image = '/product_images/'.$imageName;
            $image->page_id = $landing->id;
            $image->save();
            // dump($image->id);
            // dump($value['image']->getClientOriginalExtension());
        }

        foreach ($request->product as $key => $product) {
            // Images::create($value);..
            // dump($value);
            $detail = new Details();
            $detail->heading = $product['heading'];
            $detail->detail = isset($product['detail']) ? $product['detail'] : null;
            if(isset($product['image'])){
                $proImgName = Str::slug($request->page_name).'-'.time();
                $imageName = $proImgName.'.'.$product['image']->getClientOriginalExtension();
                $product['image']->move(public_path('/detail_images'), $imageName);
                $detail->image = '/product_images/'.$imageName;
            }
            $detail->page_id = $landing->id;
            $detail->save();
            dump($detail->id);
        }
    }
}
