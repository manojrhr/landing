@extends('layouts.admin.master')

@section('title', 'Airport Transfers')
@section('subtitle')

@section('style')

@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" id="tour_tab"><a href="#airTrans" data-toggle="tab">Airport Transfer Pricing</a></li>
              {{-- <li id="tour_option_tab"><a href="#private" data-toggle="tab">Private</a></li> --}}
              {{-- <li><a href="#password" data-toggle="tab">Change User Password</a></li> --}}
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="airTrans">
                  {{-- action="{{ route('admin.add_tour_options', $tour->id)}}" --}}
                  <form class="form-horizontal" id="sharedForm">
                  @csrf
                    <input type="hidden" name="tour_type" value="shared"/>
                    <div class="form-group">
                      <label for="type" class="col-sm-2 control-label">Transfer Type</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="type" name="type">
                          {{-- <option value="">-- Select Category for this Tour --</option> --}}
                          <option value="shared">Shared</option>
                          <option value="private">Private</option>
                        </select>
                          @error('title')
                              <span class="invalid-feedback text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
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
                      <label for="child_rate" id="price_label" class="col-sm-2 control-label">Price per PAX</label>
  
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="price_pax" name="price_pax" 
                          placeholder="Price per PAX" value="" required 
                          oninvalid="this.setCustomValidity('Please enter price per PAX')"
                          oninput="this.setCustomValidity('')"
                        />
                        <textarea class="form-control" id="private_options" name="private_options"
                         style="max-width:100%;min-height: 50px;display:none;"></textarea>
                          @error('child_rate')
                              <span class="invalid-feedback text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>

                    {{-- <div class="form-group">
                      <label for="child_rate" class="col-sm-2 control-label">Cost per Group PAX (JSON) *</label>
  
                      <div class="col-sm-10">
                        <textarea id="private_options" name="private_options"></textarea>
                        <input type="text" class="form-control" id="price_pax" name="price_pax" 
                          placeholder="Price per PAX" value="" required 
                          oninvalid="this.setCustomValidity('Please enter price per PAX')"
                          oninput="this.setCustomValidity('')"
                        />
  
                          @error('child_rate')
                              <span class="invalid-feedback text-danger" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div> --}}

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10 text-right">
                        <button type="submit" class="btn btn-danger">Add Price</button>
                      </div>
                    </div>
                  </form>
                  
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" id="tour_tab"><a href="#shared" data-toggle="tab">Shared</a></li>
              <li id="tour_option_tab"><a href="#private" data-toggle="tab">Private</a></li>
              {{-- <li><a href="#password" data-toggle="tab">Change User Password</a></li> --}}
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="shared">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Location</th>
                            <th>Price per PAX</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shareds as $shared)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $shared->location->name }}</td>
                                <td>{{ $shared->price_pax }}</td>
                                <td>
                                    <a class="btn btn-primary " dataId="{{ $shared->id }}">Edit</a>
                                    {{-- <a class="btn btn-danger" href="{{ route('admin.tour_option_delete', $option->id) }}" onclick="return confirm('Are you sure?')">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="private">
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
                </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="private">
                {{-- action="{{ route('admin.add_tour_options', $tour->id)}}" --}}
                <form class="form-horizontal" id="tourOptionsForm" method="post">
                @csrf
                  <input type="hidden" value="" id="option_id"/>
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
                      <input type="text" class="form-control" id="child_rate" name="child_rate" placeholder="Price for Child" value="" required>

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
                      <input type="text" class="form-control" id="adult_rate" name="adult_rate" placeholder="Price for Adult" value="" required>

                        @error('adult_rate')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 text-right">
                      <button type="submit" class="btn btn-danger">Create Tour Option</button>
                      <button id="updateOption" class="btn btn-primary disabled">Update Tour Option</button>
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
                          {{-- @foreach($shareds as $shared)
                              <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>
                                      {{ $shared->location->name }}
                                  </td>
                                  <td>{{ $shared->child_rate }}</td>
                                  <td>
                                      <a class="btn btn-primary getOption" dataId="{{ $option->id }}">Edit</a>
                                      <a class="btn btn-danger" href="{{ route('admin.tour_option_delete', $option->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
                                  </td>
                              </tr>
                          @endforeach --}}
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
    $('#type').on('change', function() {
      if(this.value === 'shared') {
        $('#private_options').hide();
        $('#price_pax').show();
        $('#price_label').text('Price per PAX');
      } else {
        $('#private_options').show();
        $('#price_pax').hide();
        $('#price_label').text('Cost per Group PAX (JSON)*');
      }
    });
    function getFormData($form){
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i){
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }

    $(document).ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("#sharedForm").submit(function(e){
            e.preventDefault();
            var $form = $("#sharedForm");
            var formdata = getFormData($form);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{ route("admin.store.shared") }}',
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
            formData.append('location', $("#location").val());
            formData.append('child_rate', $("#child_rate").val());
            formData.append("adult_rate", $("#adult_rate").val());
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
                            $('#child_rate').val(data.option.child_rate);
                            $('#adult_rate').val(data.option.adult_rate);
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
  </script>
@endsection