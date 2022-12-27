@extends('admin.master')

@section('title')
    Add Brand
@endsection

@section('body')
<div class="col-lg-9">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Add New Brand</h4>
            {{-- <h4 class="text-center text-success">{{Session::get('message')}}</h4> --}}
            <form action="{{route('brand.new')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand Name </label>
                    <div class="col-sm-9">  
                        <input type="text" class="form-control" id="horizontal-firstname-input" name="name" required>
                        <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Brand Description </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="horizontal-email-input" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3">Brand Image</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control-file" id="horizontal-password-input" name="image">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="" class="col-sm-3">Status </label>
                    <div class="col-sm-9">
                        <label class="mr-3"><input type="radio"  name="status" value="1" checked>Published</label>
                        <label><input type="radio"  name="status" value="0">Unpublished</label>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Add Brand</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection