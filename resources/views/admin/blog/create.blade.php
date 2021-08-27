@extends('layouts.admin.master')

@section('title', 'Create Post')
@section('subtitle')

@section('style')

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                {{-- <h3 class="box-title">CK Editor
                    <small>Advanced and full of features</small>
                </h3> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <form class="form-horizontal" method="post" action="{{ route('admin.blog.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="category_id" class="col-sm-2 control-label">Select Blog Category</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="category_id" id="category_id" required>
                            <option value="" selected>-- Select Blog Category --</option>
                            @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                value="{{ old('title') }}">

                            @error('title')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Slug</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug') }}">

                            @error('slug')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="feature_image" class="col-sm-2 control-label">Featured Image</label>
  
                      <div class="col-sm-10">
                        <input type="file" name="feature_image" id="feature_image" required>
  
                          @error('feature_image')
                              <span class="invalid-feedback text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-sm-2 control-label">Post Body</label>
    
                        <div class="col-sm-10">
                            <textarea id="editor1" name="body" rows="10" cols="80"
                                style="visibility: hidden; display: none;">{{ old('body') }}</textarea>
                            <div class="form-group">
                                
                            @error('body')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
                        <textarea type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description" value=""><{{ old('meta_description') }}/textarea>
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
                    <div class="form-group" style="margin-top: 15px">
                        <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-lg btn-danger">Create Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
  
//   CKEDITOR.replace('wysiwyg-editor', {
//         filebrowserUploadUrl: "{{route('admin.tour.create.post', ['_token' => csrf_token() ])}}",
//         filebrowserUploadMethod: 'form'
//     });
  $('#title').on('input', function() {
      var slug =  $('#title').val()
                            .toLowerCase()
                            .replace(/[^\w ]+/g,'')
                            .replace(/ +/g,'-');
      $('#slug').val(slug);
  });
</script>
@endsection