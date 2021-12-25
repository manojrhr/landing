<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\GalleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryImagesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gallery = GalleryImages::all();
        $galleries =  DB::table('gallery_images')
                    ->select('id','slug')
                    ->groupBy('slug')
                    ->get();
        // dd($gallery->count());
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryImages $gallery)
    {
        return view('admin.gallery.single', compact('$gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryImages $galleryImages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GalleryImages $galleryImages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryImages  $galleryImages
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryImages $galleryImages)
    {
        //
    }
}
