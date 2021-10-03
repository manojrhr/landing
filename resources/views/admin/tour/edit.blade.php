@extends('layouts.admin.master')

@section('title', 'Update Tours')
@section('subtitle')

@section('style')

@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#add" data-toggle="tab">Tour</a></li>
              <li><a href="#options" data-toggle="tab">Tour Options</a></li>
              {{-- <li><a href="#password" data-toggle="tab">Change User Password</a></li> --}}
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="add">
                <form class="form-horizontal" method="post" action="{{ route('admin.tour.edit.post', $tour->id)}}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Category*</label>
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
                    <label for="inputName" class="col-sm-2 control-label">Title*</label>

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
                    <label for="description" class="col-sm-2 control-label">Description*</label>

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
                    <label for="meta_title" class="col-sm-2 control-label">Meta Title</label>

                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" value="">{{ $tour->meta_title }}</textarea>
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
                      <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="">{{ $tour->meta_description }}</textarea>
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
                      <textarea type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="">{{ $tour->meta_keywords }}</textarea>
                      {{-- <input type="text" class="form-control" id="description" name="description" placeholder="Description" value=""> --}}

                        @error('meta_keywords')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Image*</label>

                    <div class="col-sm-10">
                      <input type="file" name="image" id="imgInp">
                      <p><img src="{{ asset($tour->image) }}" id="tourimage" width="150px" style="margin-top: 10px"/></p>

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
                      @foreach (json_decode($tour->photos) as $photo)
                          <img class="img-fluid" src="{{ asset($photo) }}" width="100px" style="margin-top: 5px"/>
                      @endforeach

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
              <div class="tab-pane" id="options">
                <form class="form-horizontal" method="post" action="{{ route('admin.add_tour_options', $tour->id)}}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="location" name="location">
                        {{-- <option value="">-- Select Category for this Tour --</option> --}}
                          @foreach ($locations as $location)
                              <option value="{{ $location->id }}">{{ $location->name }}</option>
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
                    <label for="child_rate" class="col-sm-2 control-label">Price for Child</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="child_rate" name="child_rate" placeholder="Price for Child" value="">

                        @error('child_rate')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="adult_rate" class="col-sm-2 control-label">Price for Adult</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="adult_rate" name="adult_rate" placeholder="Price for Adult" value="">

                        @error('adult_rate')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Tour Option</button>
                    </div>
                  </div>
                </form>
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Location</th>
                          <th>Price for Child</th>
                          <th>Price for Adult</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $i=1 ?>
                          @foreach($options as $option)
                              <tr>
                                  <td>{{ $i }}</td>
                                  <td>
                                      {{-- <a href="{{ route('admin.user.single',$category->id) }}"> --}}
                                          {{ $option->location->name }}
                                      {{-- </a> --}}
                                  </td>
                                  <td>{{ $option->child_rate }}</td>
                                  <td>{{ $option->adult_rate }}</td>
                                  <td>
                                      <a class="btn btn-primary" href="{{ route('admin.tour.edit', $option->id) }}">Edit</a>
                                      <a  class="btn btn-danger" href="{{ route('admin.tour_option_delete', $option->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                                  </td>
                              </tr>
                              <?php $i++; ?>
                          @endforeach
                  </tbody>
              </table>
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

@section('scripts')
  <script>
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        tourimage.src = URL.createObjectURL(file)
      }
    }
  </script>
@endsection