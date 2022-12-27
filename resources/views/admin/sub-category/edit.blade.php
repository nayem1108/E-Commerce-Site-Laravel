@extends('admin.master')

@section('title')
    Edit Subcategory
@endsection


@section('body')
<div class="col-lg-9">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Edit Subcategory</h4>
            <form action="{{route('update-subcategory', ['id' => $subcategory->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> Category Name </label>
                    <div class="col-sm-9">  
                        <select class="form-control" name="category_id">
                            <option value="" disabled selected>--- Select Category ---</option>
                            @foreach ($categories as $category)
                            @if ($category->status == 1)  
                            <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected' : ''}}>{{$category->name}}</option>  
                            @endif
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" >Subcategory Name </label>
                    <div class="col-sm-9">  
                    <input type="text" class="form-control" id="horizontal-firstname-input"  name="subcategory_name" Value="{{$subcategory->name}}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Subcategory Description </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="horizontal-email-input" name="description">{{$subcategory->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3">Current Image</label>
                    <div class="col-sm-9">
                        @if ($subcategory->image == '')
                            <h5 class="text-danger">NO IMAGE ADDED</h5>
                        @else
                        <img src="{{asset($subcategory->image)}}" alt="" width="100" height="100">
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
                        @if ($subcategory->status == 1)
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
                            <button type="submit" class="btn btn-primary w-md" onclick="confirm('Do You Want to update ?')">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection