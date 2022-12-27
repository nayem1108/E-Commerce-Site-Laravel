@extends('admin.master')

@section('title')
    View Product Details
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Product Full Details</h4>
                <a href="{{route('product.edit', ['id'=>$product->id])}}" class="mt-3 btn btn-primary btn-md mb-3">Edit Product</a>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <table class="table table-bordered dt-responsive nowrap">
                    <tr>
                        <th>Product Id</th>
                        <td>{{$product->id}}</td>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td>{{$product->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Code</th>
                        <td>{{$product->code}}</td>
                    </tr>
                    <tr>
                        <th>Product Category</th>
                        <td>{{$product->category->name}}</td>
                    </tr>
                    <tr>
                        <th>Product SubCategory</th>
                        <td>{{$product->subCategory->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Brand</th>
                        <td>{{$product->brand->name}}</td>
                    </tr>
                    <tr>
                        <th>Product Unit</th>
                        <td>{{$product->unit->name}}</td>
                    </tr>
                    <tr>
                        <th>Regular Price</th>
                        <td>{{$product->regular_price}}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td>{{$product->selling_price}}</td>
                    </tr>
                    <tr>
                        <th>Stock Amount</th>
                        <td>{{$product->stock_amount}}</td>
                    </tr>
                    <tr>
                        <th>Sort Description</th>
                        <td>{{$product->short_description}}</td>
                    </tr>
                    <tr>
                        <th>Long Description</th>
                        <td>{{$product->long_description}}</td>
                    </tr>
                    <tr>
                        <th>Product Images</th>
                        <td><img src="{{asset($product->image)}}" alt="" width="500" height="300"></td>
                    </tr>
                    <tr>
                        <th>Product Sub Images</th>
                        <td>
                            @foreach ($subImages as $subImage)
                            <img src="{{asset($subImage->image)}}" alt="" width="200" height="150" class="mr-1 mb-1">
                            @endforeach
                    </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                    </tr>
                </table>

            </div>
         </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection