@extends('admin.master')

@section('title')
    Manage Brand
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Manage Brand</h4>
                <a href="{{route('add-brand')}}" class="mt-3 btn btn-primary btn-md mb-3">Add Brand</a>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Brand Name</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->description}}</td>
                            <td>
                                @if ($brand->image == '')
                                <h5 class="text-danger">NO IMAGE ADDED</h5>
                                @else
                                <img src="{{asset($brand->image)}}" alt="" width="108" height="108"></td>
                                @endif
                            <td>{{$brand->status}}</td>
                            <td>
                                <a href="{{route('brand.edit', ['id' => $brand->id])}}" class="btn btn-success btn-md">
                                <i class="fa fa-edit"></i></a>
                                <a href="{{route('brand.delete', ['id' => $brand->id])}}" class="btn btn-danger btn-md" onclick="confirm('Are you sure to delete this brand?')">
                                    <i class="fa fa-trash"></i></a>
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