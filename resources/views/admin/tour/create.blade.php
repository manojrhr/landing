@extends('layouts.admin.master')

@section('title', 'Add Tour')
@section('subtitle')

@section('style')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<style>
  .bootstrap-select > .dropdown-toggle {
    width: 400%;
}
</style>
@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#add" data-toggle="tab">Add Tour</a></li>
              {{-- <li><a href="#password" data-toggle="tab">Change User Password</a></li> --}}
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="add">
                <form class="form-horizontal" method="post" action="{{ route('admin.tour.create.post')}}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Category*</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="category" name="category">
                        {{-- <option value="">-- Select Category for this Tour --</option> --}}
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->title }} - {{ $category->subtitle }}</option>
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
                      <select id="subcategory" name="subcategory[]" class="form-group selectpicker" multiple data-live-search="true">
                        <option value="">-- Select Sub Category for this Tour --</option>
                          @foreach ($subcategories as $subcategory)
                              <option value="{{ $subcategory->id }}">{{ $subcategory->title }} - {{ $subcategory->subtitle }}</option>
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
                      <input type="text" class="form-control" id="inputName" name="title" placeholder="Title*" value="{{ old('title') }}">

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
                      <textarea type="text" class="form-control" id="description" name="description" placeholder="Description*" value="">{{ old('description') }}</textarea>
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
                      <textarea type="text" class="form-control" id="included" name="included" placeholder="Included" value="">{{ old('included') }}</textarea>
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
                      <textarea type="text" class="form-control" id="add_info" name="add_info" placeholder="Additional Information" value="">{{ old('add_info') }}</textarea>
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
                      <textarea type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" value="">{{ old('meta_title') }}</textarea>
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
                      <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value="">{{ old('meta_description') }}</textarea>
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
                      <textarea type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="">{{ old('meta_keywords') }}</textarea>
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
                      <input type="file" name="image" id="image" required>

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
                      <input type="file" name="photos[]" id="photos" multiple="multiple" required>

                        @error('photos')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Create Tour</button>
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

@section('scripts')
  <!-- CK Editor -->
  <script src="{{ asset('assets/admin/bower_components/ckeditor/ckeditor.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
  <script>    
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('description');
      CKEDITOR.replace('included');
      CKEDITOR.replace('add_info');
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5();
    })
  </script>
@endsection