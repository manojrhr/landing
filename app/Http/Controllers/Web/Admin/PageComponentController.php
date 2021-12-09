<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\PageComponent;
use Illuminate\Http\Request;
use Validator;

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
        $component = $pageComponent;
        return view('admin.page-component.edit', compact('component'));
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
        $validator = Validator::make($request->all(), [
            'body' => ['required'],
        ]);

        if ($validator->fails()) {
            $errors = implode(',', $validator->messages()->all());
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', $errors);
            return Redirect ::back()->withInput();
        }

        $pageComponent->body = $request->body;

        if($pageComponent->save()){
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Post created successfully.');
        } else {
            $request->session()->flash('message.level', 'error');
            $request->session()->flash('message.content', 'Something went wrong.');
        }
        return redirect()->route('admin.page-component.index');
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
