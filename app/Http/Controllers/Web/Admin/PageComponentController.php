<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\PageComponent;
use Illuminate\Http\Request;

class PageComponentController extends Controller
{
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
        $title = 'Page Components';
        $components = PageComponent::all();
        return view('admin.page-component.index', compact('components', 'title'));
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
     * @param  \App\PageComponent  $pageComponent
     * @return \Illuminate\Http\Response
     */
    public function show(PageComponent $pageComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PageComponent  $pageComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(PageComponent $pageComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PageComponent  $pageComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageComponent $pageComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PageComponent  $pageComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageComponent $pageComponent)
    {
        //
    }
}
