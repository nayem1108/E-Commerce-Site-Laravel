@extends('admin.master')

@section('title')
    Manage Product
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Manage Product</h4>
                <a href="{{route('add-product')}}" class="mt-3 btn btn-primary btn-md mb-3">Create Product</a>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Product Name</th>
                        <th>Selling Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->subcategory->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->selling_price}}</td>
                            <td>{{$product->status ==  1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('product.view-details', ['id' =>$product->id])}}" target="__blank" class="btn btn-primary btn-sm" title="View Product Details">
                                    <i class="fa fa-book-open"></i>
                                </a>
                                <a href="{{route('product.edit', ['id' =>$product->id])}}" class="btn btn-success btn-sm" title="Edit Product Details">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('product.delete', ['id' =>$product->id])}}" class="btn btn-danger btn-sm" title="Delete Product" onclick="confirm('Are you sure to delete this product')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
         </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection