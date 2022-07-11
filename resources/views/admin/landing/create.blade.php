@extends('layouts/admin/master')

@section('title', 'Create Landing Page')
@section('subtitle', 'New Page')


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Enter Landing Page Details</h3>
            </div>

            <form role="form" method="POST" action="{{ route('admin.addLanding') }}" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="page_name">Page/Product Name</label>
                            <input type="text" class="form-control" id="page_name" name="page_name" placeholder="Page Name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price"  name="price" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Actual Price <small>(<span style="text-decoration: line-through;">19.00</span>)</small></label>
                            <input type="text" class="form-control" id="actual_price" name="actual_price" placeholder="Actual Price" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="+41 985 655 6548">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Product Images</label>
                        <table class="table" id="dynamicTable">
                            <tr class="text-center">
                                <td style="width: 20%"><input type="file" accept="image/*" name="img[0][image]" required></td>
                                <td style="width: 20%"><input type="text" class="form-control" name="img[0][name]" placeholder="Image Name" required></td>
                                <td class="text-left"><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <h3>Add Product Details</h3>
                        {{-- <div class="form-group">
                            <label for="phone">Product Detail Heading</label>
                            <input type="text" class="form-control" id="phone" name="product_detail_heading" placeholder="Product Detail Heading">
                        </div>
                        <div class="form-group">
                            <label for="product_detail_heading">Product Detail Text</label>
                            <textarea class="form-control" id="product_detail_text"  name="product_detail_text" rows="3"></textarea>
                        </div>
                        <h3>Add Product Sub Details</h3> --}}
                        <table class="table" id="dynamicDetailTable">
                            <tr class="text-center">
                                <td style="width: 20%"><input type="text" class="form-control" name="product[0][heading]" placeholder="Heading" required></td>
                                <td style="width: 30%"><textarea class="form-control" name="product[0][detail]" rows="3" placeholder="Detail"></textarea></td>
                                <td style="width: 20%"><input type="file" accept="image/*" name="product[0][image]"></td>
                                <td class="text-left"><button type="button" name="add" id="addDetail" class="btn btn-success">Add More</button></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/admin/dist/js/pages/dashboard.js') }}"></script>
<script>
  $('#datatablesSimple').DataTable();
</script>

<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
        ++i;
        $("#dynamicTable").append('<tr><td style="width: 20%"><input type="file" accept="image/*" name="img['+i+'][image]" required></td><td style="width: 20%"><input type="text" class="form-control" name="img['+i+'][name]" placeholder="Image Name" required></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){
         $(this).parents('tr').remove();  
        var rowCount = $('#dynamicTable tr').length;
        i = rowCount - 1;
    });  
   
    var j = 0;
       
    $("#addDetail").click(function(){
        ++j;
        $("#dynamicDetailTable").append('<tr><td style="width: 20%"><input type="text" class="form-control" name="product['+j+'][heading]" placeholder="Heading" required></td><td style="width: 20%"><textarea class="form-control" name="product['+j+'][detail]" rows="3" placeholder="Detail"></textarea></td><td style="width: 20%"><input type="file" accept="image/*" name="product['+j+'][image]"></td><td><button type="button" class="btn btn-danger remove-trd">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-trd', function(){
         $(this).parents('tr').remove();  
        var rowCount = $('#dynamicDetailTable tr').length;
        j = rowCount - 1;
    });  

    $("#page_name").keyup(function() {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
        $("#slug").val(Text);        
    });
</script>
@endsection