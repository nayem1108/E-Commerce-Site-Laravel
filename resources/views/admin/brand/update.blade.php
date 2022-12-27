@extends('admin.master')

@section('title')
    Update Brand
@endsection


@section('body')
<div class="col-lg-9">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Edit Brand Info</h4>
            <form action="{{route('brand.update', ['id' => $brand->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label" >Brand Name </label>
                    <div class="col-sm-9">  
                      <input type="text" class="form-control" id="horizontal-firstname-input" Value="{{$brand->name}}" name="name">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Brand Description </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="horizontal-email-input" name="description">{{$brand->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3">Current Image</label>
                    <div class="col-sm-9">
                        @if ($brand->image == '')
                            <h5 class="text-danger">NO IMAGE ADDED</h5>
                        @else
                        <img src="{{asset($brand->image)}}" alt="" width="100" height="100">
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
                        <label class="mr-3"><input type="radio"  name="status" {{$brand->status == 1 ? 'checked' : ''}} value="1" checked>Published</label>
                        <label><input type="radio"  name="status" {{$brand->status == 0 ? 'checked' : ''}} value="0">Unpublished</label>    
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9"> 
                        <div>
                            <button type="submit" class="btn btn-primary w-md" onclick="confirm('Do You Want to update Brand Info?')">Update Brand</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection