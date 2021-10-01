<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Location;
use App\SubCategory;
use App\Tour;
use App\TourOption;
use Validator;
use Redirect;
use Image;

class TourController extends Controller
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
        $title = "Tour";
        $subTitle = "All Tours";
        $tours = Tour::all();
        return view('admin.tour.index', compact('tours', 'title', 'subTitle'));
    }

    public function showForm()
    {
        $categories = Category::all(['id', 'title', 'subtitle']);
        $subcategories = SubCategory::all(['id', 'title', 'subtitle']);
        return view('admin.tour.create',compact('categories', 'subcategories'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }
        
        $tour = new Tour();
        $tour->category_id = $request->category;
        $tour->subcategory_id = $request->subcategory;
        $tour->title = $request->title;
        $tour->slug = str_slug($request->title);
        $tour->description = $request->description;
        $tour->included = $request->included;
        $tour->add_info = $request->add_info;
        $tour->meta_title = $request->meta_title;
        $tour->meta_description = $request->meta_description;
        $tour->meta_keywords = $request->meta_keywords;

        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $allowedfileExtension=['jpg','jpeg','png'];
            $check=in_array($avatar->getClientOriginalExtension(),$allowedfileExtension);
            if($check)
            {
                $filename = time() .'.'. $avatar->getClientOriginalExtension();
                $photo  = Image::make($avatar->getRealPath())->resize(300, 300, function($constraint)
                {
                    $constraint->aspectRatio();
                })->save(public_path('images/tour/'.$filename));

                $fileName = 'images/tour/'.$filename;
                $tour->image = $fileName;
            }
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Tour Image is requried.');
            return Redirect::back();
        }
        if($request->hasFile('photos')){
            $photos = [];
            foreach ($request->file('photos') as $image) { 
                $allowedfileExtension=['jpg','jpeg','png'];
                $check=in_array($image->getClientOriginalExtension(),$allowedfileExtension);
                if($check)
                {
                    $filename = microtime(true) .'.'. $image->getClientOriginalExtension();
                    $photo  = Image::make($image->getRealPath())->resize(null, 627, function($constraint)
                    {
                        $constraint->aspectRatio();
                    })->save(public_path('images/tour/'.$filename));
                    $photos[] = 'images/tour/'.$filename;
                }
            }
            $tour->photos=json_encode($photos);
        }

        if($tour->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Tour created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.tour');
    }

    public function edit($id)
    {
        // dd($id);
        $categories = Category::all(['id', 'title', 'subtitle']);
        $subcategories = SubCategory::all(['id', 'title', 'subtitle']);
        $tour = Tour::findOrFail($id);
        $locations = Location::all();
        $options = TourOption::with('location')->where('tour_id',$tour->id)->get();
        return view('admin.tour.edit', compact('tour','subcategories', 'categories', 'locations', 'options'));
    }

    public function delete($id, Request $request)
    {
        $tour = Tour::findOrFail($id);
        $tour_option = TourOption::where('tour_id', $tour->id)->delete();
        $image = $tour->image;
        if($tour->delete()){
            unlink($image);
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Tour deleted successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }

    public function tour_option_delete($id, Request $request)
    {
        $option = TourOption::findOrFail($id);
        if($option->delete()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Option deleted successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required']
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }
        
        $tour = Tour::findOrFail($id);
        $tour->category_id = $request->category;
        $tour->subcategory_id = $request->subcategory;
        $tour->title = $request->title;
        $tour->slug = str_slug($request->title);
        $tour->description = $request->description;
        $tour->included = $request->included;
        $tour->add_info = $request->add_info;
        $tour->meta_title = $request->meta_title;
        $tour->meta_description = $request->meta_description;
        $tour->meta_keywords = $request->meta_keywords;

        if($request->hasFile('image')){
            unlink($tour->image);
            $avatar = $request->file('image');
            $allowedfileExtension=['jpg','jpeg','png'];
            $check=in_array($avatar->getClientOriginalExtension(),$allowedfileExtension);
            if($check)
            {
                $filename = time() .'.'. $avatar->getClientOriginalExtension();
                $photo  = Image::make($avatar->getRealPath())->resize(300, 300, function($constraint)
                {
                    $constraint->aspectRatio();
                })->save(public_path('images/tour/'.$filename));

                $fileName = 'images/tour/'.$filename;
                $tour->image = $fileName;
            }
        }

        if($request->hasFile('photos')){
            foreach (json_decode($tour->photos) as $dphoto) { 
                unlink($dphoto);
            }
            $photos = [];
            foreach ($request->file('photos') as $image) { 
                $allowedfileExtension=['jpg','jpeg','png'];
                $check=in_array($image->getClientOriginalExtension(),$allowedfileExtension);
                
                if($check)
                {
                    $filename = microtime(true) .'.'. $image->getClientOriginalExtension();
                    $photo  = Image::make($image->getRealPath())->resize(null, 627, function($constraint)
                    {
                        $constraint->aspectRatio();
                    })->save(public_path('images/tour/'.$filename));
                    $photos[] = 'images/tour/'.$filename;
                }
            }
            $tour->photos=json_encode($photos);
        }

        if($tour->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Tour updated successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.tour');
    }

    public function add_tour_options($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'location' => ['required'],
            'child_rate' => ['required'],
            'adult_rate' => ['required']
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect::back();
        }

        $option = new TourOption();
        $option->tour_id = $id;
        $option->location_id = $request->location;
        $option->child_rate = $request->child_rate;
        $option->adult_rate = $request->adult_rate;

        if($option->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Tour option updated successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return Redirect::back();
    }
}
