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
                <form class="form-horizontal" method="post" action="{{ route('admin.tour.edit.post', $tour->id)}}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="category" name="category">
                        {{-- <option value="">-- Select Category for this Tour --</option> --}}
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}" {{ $category->id === $tour->category_id ? 'selected' : '' }}>{{ $category->title }} - {{ $category->subtitle }}</option>
                          @endforeach
                      </select>
                        @error('title')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="subcategory" class="col-sm-2 control-label">Sub Category</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="subcategory" name="subcategory">
                        <option value="">-- Select Sub Category for this Tour --</option>
                          @foreach ($subcategories as $subcategory)
                              <option value="{{ $subcategory->id }}" {{ $category->id === $tour->subcategory_id ? 'selected' : '' }}>{{ $subcategory->title }} - {{ $subcategory->subtitle }}</option>
                          @endforeach
                      </select>
                        @error('title')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="title" placeholder="Title" value="{{ $tour->title }}">

                        @error('title')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="description" name="description" placeholder="Description" value="">{{ $tour->description }}</textarea>
                      {{-- <input type="text" class="form-control" id="description" name="description" placeholder="Description" value=""> --}}

                        @error('description')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="included" class="col-sm-2 control-label">included</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="included" name="included" placeholder="Included" value="">{{ $tour->included }}</textarea>
                      {{-- <input type="text" class="form-control" id="description" name="description" placeholder="Description" value=""> --}}

                        @error('included')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="add_info" class="col-sm-2 control-label">Additional Information</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="add_info" name="add_info" placeholder="Additional Information" value="">{{ $tour->add_info }}</textarea>
                      {{-- <input type="text" class="form-control" id="description" name="description" placeholder="Description" value=""> --}}

                        @error('add_info')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image</label>

                    <div class="col-sm-10">
                      <input type="file" name="image" id="image">

                        @error('image')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="photos" class="col-sm-2 control-label">Gallery Photos</label>

                    <div class="col-sm-10">
                      <input type="file" name="photos[]" id="photos" multiple="multiple">

                        @error('photos')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Tour</button>
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
