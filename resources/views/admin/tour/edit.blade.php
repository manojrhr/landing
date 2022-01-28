@extends('layouts.admin.master')

@section('title', 'Update Tours')
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
              <li class="active" id="tour_tab"><a href="#add" data-toggle="tab">Tour</a></li>
              <li id="tour_option_tab"><a href="#options" data-toggle="tab">Additional Tour Packages</a></li>
              {{-- <li><a href="#password" data-toggle="tab">Change User Password</a></li> --}}
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="add">
                <form class="form-horizontal" method="post" action="{{ route('admin.tour.edit.post', $tour->id)}}" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Category*</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="category" onChange="get_scategory()" name="category">
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
                      <select id="subcategory" name="subcategory[]" class="form-group " style="margin-left: 1px; width: 100%;"  multiple data-live-search="true">
                        {{-- <option value="">-- Select Sub Category for this Tour --</option> --}}
                          @foreach ($subcategories as $subcategory)
                              <option value="{{ $subcategory->id }}" {{ in_array($subcategory->id, $subcategories_ids) ? 'selected' : '' }}>{{ $subcategory->title }} - {{ $subcategory->subtitle }}</option>
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
                      <textarea type="text" class="form-control editor" id="description" name="description" placeholder="Description" value="">{{ $tour->description }}</textarea>
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
                      <textarea type="text" class="form-control editor" id="included" name="included" placeholder="Included" value="">{{ $tour->included }}</textarea>
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
                      <textarea type="text" class="form-control editor" id="add_info" name="add_info" placeholder="Additional Information" value="">{{ $tour->add_info }}</textarea>
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
                    <div class="col-sm-offset-2 col-sm-10 text-right">
                      <button type="submit" class="btn btn-danger">Update Tour</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="options">
                {{-- action="{{ route('admin.add_tour_options', $tour->id)}}" --}}
                <form class="form-horizontal" id="tourOptionsForm" method="post">
                @csrf
                  <input type="hidden" value="" id="option_id"/>
                  {{-- <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Location</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="location" name="location">
                          @foreach ($locations as $location)
                            @if($location->active)
                              <option value="{{ $location->id }}">{{ $location->name }} | {{ $location->city }}</option>
                            @endif
                          @endforeach
                      </select>
                        @error('title')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div> --}}
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Title</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="title" name="title" placeholder="Additional Tour Title" value="" required>

                        @error('title')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="price" name="price" placeholder="Price for Additional Tour" value="" required>

                        @error('price')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 text-right">
                      <button type="submit" class="btn btn-danger">Add Additional Tour</button>
                      <button id="updateOption" class="btn btn-primary disabled">Update Tour Option</button>
                    </div>
                  </div>
                </form>
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          {{-- <th>Location</th> --}}
                          <th>Tour Title</th>
                          <th>Price</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $i=1 ?>
                          @foreach($options as $option)
                            {{-- @if(!$option->location->active)
                                <tr  style="background-color:#f5cccc !important">
                            @else --}}
                                <tr>
                            {{-- @endif --}}
                                  <td>{{ $i }}</td>
                                  <td>{{ $option->title }}</td>
                                  <td>{{ $option->price }}</td>
                                  <td>
                                      <a class="btn btn-primary getOption" dataId="{{ $option->id }}">Edit</a>
                                      <a class="btn btn-danger" href="{{ route('admin.tour_option_delete', $option->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
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

    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        tourimage.src = URL.createObjectURL(file)
      }
    }

    function getFormData($form){
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }

    $(document).ready(function(){
        $('#updateOption').addClass('disabled');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#tourOptionsForm").submit(function(e){
            e.preventDefault();
            var $form = $("#tourOptionsForm");
            var formdata = getFormData($form);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("admin.add_tour_options", $tour->id) }}',
                type: 'POST',
                data: formdata,
                dataType: 'JSON',
                success: function (data) { 
                    alertify.set('notifier','position', 'top-right');
                    if(data.success === true){
                        alertify.success(data.message, '', 5,);
                        window.timeout = setTimeout(function(){
                            alertify.dismissAll();
                        },5000);
                        location.reload();
                    } else {
                        alertify.error(data.message, '', 5,);
                        window.timeout = setTimeout(function(){
                            alertify.dismissAll();
                        },5000);
                    }
                }
            });
        });

        $("#updateOption").click(function(e){
            e.preventDefault();
            var formData = new FormData();
            formData.append('id', $("#option_id").val());
            // formData.append('location', $("#location").val());
            formData.append('title', $("#title").val());
            formData.append("price", $("#price").val());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("admin.update_tour_option") }}',
                type: 'POST',
                data: formData,
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) { 
                    alertify.set('notifier','position', 'top-right');
                    if(data.success === true){
                        alertify.success(data.message, '', 5,);
                        window.timeout = setTimeout(function(){
                            alertify.dismissAll();
                        },5000);
                        location.reload();
                    } else {
                        alertify.error(data.message, '', 5,);
                        window.timeout = setTimeout(function(){
                            alertify.dismissAll();
                        },5000);
                    }
                }
            });
        });
        
        $(".getOption").click(function(e){
                // alert($(this).attr('dataId')); return;
                var id = $(this).attr('dataId');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '{{ route("admin.getOptionDetails") }}',
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "option_id": id
                    },
                    dataType: 'JSON',
                    success: function (data) { 
                        if(data.success === true){
                            // $(".model-form").attr("id","updateEventTime");
                            // $('#updateModelLabel').html('Update Availability for '+moment(data.event.date).format('MM/DD/YYYY'));
                            $('#option_id').val(data.option.id);
                            $('#title').val(data.option.title);
                            $('#price').val(data.option.price);
                            $('#updateOption').removeClass('disabled');
                        } else {
                            alertify.error(data.message, '', 5,);
                            window.timeout = setTimeout(function(){
                                alertify.dismissAll();
                            },5000);
                        }
                    }
                });
            });

    });
    
    function get_scategory() {
        var category_id = jQuery("#category").val();
        jQuery.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('admin.get_subcategory') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "category_id": category_id,
            },
            dataType: 'JSON',
            success: function (data) {
                // $('#subcategory').html('<option value="">--Select Subcategory--</option>'); 
                $('#subcategory').empty();
                if (data.scat.length === 0) {
                    $('#subcategory').html('<option value="">--Sorry No subcategory available--</option>'); 
                }
                $.each(data.scat,function(key,value){
                    $("#subcategory").append('<option value="'+value.id+'">'+value.title+'</option>');
                });
            }
        });
    }
  </script>
@endsection