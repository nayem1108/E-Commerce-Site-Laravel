@extends('admin.master')

@section('title')
    Manage Sub Category
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Manage Sub Category</h4>
                <a href="{{route('add-sub-category')}}" class="mt-3 btn btn-primary btn-md mb-3">Add Sub Category</a>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>SubCategory Name</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td>{{$subcategory->description}}</td>
                            <td>
                                @if ($subcategory->image == '')
                                <h5 class="text-danger">NO IMAGE ADDED</h5>
                                @else
                                <img src="{{asset($subcategory->image)}}" alt="" width="108" height="108"></td>
                                @endif
                            <td>{{$subcategory->status ==  1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('edit-subcategory', ['id' => $subcategory->id])}}" class="btn btn-success btn-md">
                                <i class="fa fa-edit"></i></a>
                                <a href="{{route('subcategory.delete', ['id' => $subcategory->id])}}" class="btn btn-danger btn-md" onclick="confirm('Are you sure to delete this brand?')">
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