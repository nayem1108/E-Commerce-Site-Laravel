@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Manage Category</h4>
                <a href="{{route('add-category')}}" class="mt-3 btn btn-primary btn-md mb-3">Create Category</a>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                @if ($category->image == '')
                                    <h5 class="text-danger">NO IMAGE ADDED</h5>
                                @else
                                    <img src="{{asset($category->image)}}" alt="" width="108" height="108"></td>
                                @endif
                            <td>{{$category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-success btn-md">Update</a>
                                <a href="{{route('category.delete',['id'=> $category->id])}}" class="btn btn-danger btn-md" onclick="confirm('Are you sure to delete ?')">Delete</a>
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