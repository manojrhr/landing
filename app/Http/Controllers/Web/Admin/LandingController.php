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
use Validator;

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
        $pages = Pages::all();
        return view('admin.landing.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.landing.create');
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page_name' => ['required'],
            'slug' => ['required'],
            'price' => ['required'],
            'actual_price' => ['required'],
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back()->withInput();
            // return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

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
            $image->pages_id = $landing->id;
            $image->save();
            // dump($image->id);
            // dump($value['image']->getClientOriginalExtension());
        }
        $i = 0;
        foreach ($request->product as $key => $product) {
            // Images::create($value);..
            // dump($value);
            $detail = new Details();
            $detail->heading = $product['heading'];
            $detail->detail = isset($product['detail']) ? $product['detail'] : null;
            if(isset($product['image'])){
                $proImgName = Str::slug($request->page_name).$i.'-'.time();
                $imageName = $proImgName.'.'.$product['image']->getClientOriginalExtension();
                $product['image']->move(public_path('/detail_images'), $imageName);
                $detail->image = '/detail_images/'.$imageName;
            }
            $detail->pages_id = $landing->id;
            $detail->save();
            $i++;
            // dump($detail->id);
        }
        return redirect()->route('admin.landing')->with('success', 'Landing Page Created Successfully!');
    }
}
