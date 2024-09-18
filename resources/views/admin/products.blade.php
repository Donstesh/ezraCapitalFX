@extends('layouts.admin')
  
@section('content')
<div class="main-content">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-header d-block">
                <h3 class="mb-2">Products</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newProductModal"><i class="ik ik-plus-square"></i>New Product</button>
                <div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form class="forms-sample" id="new-product">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newProductModalLabel">Add New Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-header"><h3>Product Details</h3></div>
                                        <div class="card-body">
                                            
                                                <div class="form-group">
                                                    <label>Product image</label>
                                                    <input type="file" name="img" class="file-upload-default">
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputProductName">Product Name</label>
                                                    <input type="text" name="title" class="form-control" id="inputProductName" placeholder="Name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Product Description</label>
                                                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="selectMCategory">Main Category</label>
                                                            <select name="Main_category" class="form-control" id="selectMCategory">
                                                                <option>-- Select Main Category --</option>
                                                                @foreach($main_category as $mctgry)
                                                                <option value="{{$mctgry->name}}">{{$mctgry->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="selectCategory">Category</label>
                                                            <select name="category" class="form-control" id="selectCategory">
                                                                <option>-- Select Sub Category --</option>
                                                                @foreach($category as $ctgry)
                                                                <option value="{{$ctgry->category_name}}">{{$ctgry->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="selectStatus">P. Status</label>
                                                            <select name="product_status" class="form-control" id="selectStatus">
                                                                <option>Available</option>
                                                                <option>Out of Stock</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="balance">Balance</label>
                                                            <input type="text" name="balance" class="form-control" id="balance" placeholder="Balance">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="qty">Qty</label>
                                                            <input type="text" name="quantity" class="form-control" id="qty" placeholder="Qty">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleSelectGender">Product Price</label>
                                                            <input type="text" name="price" class="form-control" id="price" placeholder="Price">
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="dt-responsive">
                    <table id="products-table"
                            class="table table-striped table-bordered ">
                        <thead>
                        <tr>
                            <th>Products Image</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>M.Category</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Balance</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><img src="{{ asset($product->image) }}" class="table-user-thumb" alt=""></td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->Main_category }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->balance }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->product_status }}</td>
                                <td>
                                    <a href="{{route('admin.product.delete',['id'=>$product->id])}}" class = "btn btn-danger">
                                        <i class="ik ik-trash-2"></i>
                                    </a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Products Image</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>M.Category</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Balance</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#new-product').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this); // Create a FormData object from the form

            $.ajax({
                url: '{{ route("save-product.store") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        $('#new-product')[0].reset();
                        $('#newProductModal').modal('hide'); 
                        window.location.reload();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

@endsection