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
            return redirect()->route('admin.tour.edit', $tour->id);
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
            return redirect()->route('admin.tour');
        }
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
            if (file_exists(public_path($image))) {
                // dd('File is Exists ');
                unlink($image);
            }
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
            if (file_exists(public_path($tour->image))) {
                unlink(public_path($tour->image));
            }
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
                if (file_exists(public_path($dphoto))) {
                    unlink(public_path($dphoto));
                }
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
            $response = ['success' => false, 'message' => $errors];
            // $request->session()->flash('message.level', 'error');
            // $request->session()->flash('message.content', $errors);
            return json_encode($response);
            // return Redirect::back();
        }

        $tourOption = TourOption::where('tour_id', $id)->where('location_id', $request->location)->first();
        if($tourOption)
        {
            $option = $tourOption;
        } else {
            $option = new TourOption();
        }

        $option->tour_id = $id;
        $option->location_id = $request->location;
        $option->child_rate = $request->child_rate;
        $option->adult_rate = $request->adult_rate;

        $tour = Tour::find($id);
        $tour->active = 1;
        $tour->save();
        
        if($option->save())
        { 
            if($tourOption){
                $response = ['success' => true, 'message' => 'Tour option updated successfully.'];
            } else {
                $response = ['success' => true, 'message' => 'Tour option created successfully.'];
            }
        } else {
            $response = ['success' => false, 'message' => 'Something went wrong.'];
        }
        return json_encode($response);
    }

    public function get_option_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'option_id' => 'required|exists:tour_options,id',
        ]);

        if ($validator->fails()) {

            $errors = implode(',', $validator->messages()->all());
            return $response_array = ['success' => false , 'message' => $errors, 'error_code' => 101];
        }

        $option = TourOption::where(['id' => $request->option_id])->first();
        
        if($option){
            $response_array = ['success' => true, 'option' => $option];
        } else {
            $response_array = ['success' => false , 'message' => 'Something went wrong.', 'error_code' => 101];
        }
        return json_encode($response_array);
    }

    public function update_tour_option(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'location' => ['required'],
            'child_rate' => ['required'],
            'adult_rate' => ['required']
        ],[
            'id.required' => 'Something went wrong. Please reload page.'
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $response = ['success' => false, 'message' => $errors];
            // $request->session()->flash('message.level', 'error');
            // $request->session()->flash('message.content', $errors);
            return json_encode($response);
            // return Redirect::back();
        }

        $option = TourOption::find($request->id);
        // $option->tour_id = $request->id;
        $option->location_id = $request->location;
        $option->child_rate = $request->child_rate;
        $option->adult_rate = $request->adult_rate;

        if($option->save())
        {
            $response = ['success' => true, 'message' => 'Tour option updated successfully.'];
        } else {
            $response = ['success' => false, 'message' => 'Something went wrong.'];
        }
        return json_encode($response);
    }

    public function toggleActive(Tour $tour, Request $request)
    {
        if(count($tour->option) <= 0)
        {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Please add tour option for this tour.');
            return Redirect::back();
        }

        $tour->active= !$tour->active;
        $tour->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Status Changed');
        return Redirect::back();
    }
}
