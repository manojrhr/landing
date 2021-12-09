@extends('layouts.admin.master')

@section('title', 'Edit Component')
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
                <form class="form-horizontal" method="POST" action="{{ route('admin.page-component.update', $component->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Slug</label>

                        <div class="col-sm-10">
                            {{-- <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug', $blog->slug) }}"> --}}
                            <label class="form-control">{{ $component->slug }}</label>
                            @error('slug')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body" class="col-sm-2 control-label">Post Body</label>
    
                        <div class="col-sm-10">
                            @if($component->single === 1)
                                <input type="text" class="form-control" id="body" name="body" placeholder="body" value="{{ old('slug', $component->body) }}">
                            @else
                                <textarea @if($component->single === 0) id="editor1" @endif name="body" rows="10" cols="80"
                                    style=" @if($component->single === 0) visibility: hidden; display: none; @endif">{{ old('body', $component->body) }}</textarea>
                            @endif

                            @error('body')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 15px">
                        <div class="col-sm-offset-2 col-sm-10 text-right">
                        <button type="submit" class="btn btn-lg btn-danger">Update</button>
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
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5();
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