@extends('layouts.admin.master')

@section('title', 'Add Category')
@section('subtitle')

@section('style')

@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#add" data-toggle="tab">Add Category</a></li>
              {{-- <li><a href="#password" data-toggle="tab">Change User Password</a></li> --}}
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="add">
                <form class="form-horizontal" method="post" action="{{ route('admin.category.edit.post', $category->id)}}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="title" placeholder="Title" value="{{ $category->title }}">

                        @error('title')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="subtitle" class="col-sm-2 control-label">Subtitle</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Subtitle" value="{{ $category->subtitle }}">

                        @error('subtitle')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="meta_title" class="col-sm-2 control-label">Meta Title</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" value="">{{ $category->meta_title }}</textarea>
                      {{-- <input type="text" class="form-control" id="description" name="description" placeholder="Description" value=""> --}}

                        @error('meta_title')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="meta_description" class="col-sm-2 control-label">Meta Description</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="">{{ $category->meta_description }}</textarea>
                      {{-- <input type="text" class="form-control" id="description" name="description" placeholder="Description" value=""> --}}

                        @error('meta_description')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="meta_keywords" class="col-sm-2 control-label">Meta Keywords</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="">{{ $category->meta_keywords }}</textarea>
                      {{-- <input type="text" class="form-control" id="description" name="description" placeholder="Description" value=""> --}}

                        @error('meta_keywords')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <img src="{{ asset($category->image) }}"/>
                    <label for="inputPhone" class="col-sm-2 control-label">Change Image</label>

                    <div class="col-sm-10">
                      <input type="file" name="img" id="img">

                        @error('image')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Category</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection
