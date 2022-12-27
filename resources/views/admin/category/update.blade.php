@extends('admin.master')

@section('title')
    Update Category
@endsection


@section('body')
<div class="col-lg-9">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Update Category</h4>
            <form action="{{route('category.update', ['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" >Category Name </label>
                    <div class="col-sm-9">  
                      <input type="text" class="form-control" id="horizontal-firstname-input" Value="{{$category->name}}" name="name">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category Description </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="horizontal-email-input" name="description">{{$category->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3">Current Image</label>
                    <div class="col-sm-9">
                        @if ($category->image == '')
                            <h5 class="text-danger">NO IMAGE ADDED</h5>
                        @else
                        <img src="{{asset($category->image)}}" alt="" width="100" height="100">
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3">Upload New Image</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control-file" id="horizontal-password-input" name="image">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="" class="col-sm-3">Status </label>
                    <div class="col-sm-9">
                        @if ($category->status == 1)
                            <label class="mr-3"><input type="radio"  name="status" value="1" checked>Published</label>
                        <label><input type="radio"  name="status" value="0">Unpublished</label>    

                        @else
                        <label class="mr-3"><input type="radio"  name="status" value="1">Published</label>
                        <label><input type="radio"  name="status" value="0" checked>Unpublished</label>    
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <div>
                            <button type="submit" class="btn btn-primary w-md" onclick="confirm('Do You Want to update ?')">Update Category</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection