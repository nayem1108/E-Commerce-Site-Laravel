@extends('admin.master')

@section('title')
    Add Product
@endsection

@section('body')
<div class="col-lg-9">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Add New Product</h4>
            {{-- <h4 class="text-center text-success">{{Session::get('message')}}</h4> --}}
            <form action="{{route('product.new')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> Category Name </label>
                    <div class="col-sm-9">  
                        <select class="form-control" name="category_id" required onchange="getSubcategory(this.value)">
                            <option value="" disabled selected>--- Select Category ---</option>
                            @foreach ($categories as $category)
                            @if ($category->status == 1)  
                            <option value="{{$category->id}}">{{$category->name}}</option>  
                            @endif
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> SubCategory Name </label>
                    <div class="col-sm-9">  
                        <select class="form-control" name="subcategory_id" required id="subCategoryId">
                            <option value="" disabled selected>--- Select SubCategory ---</option>
                        </select>
                        <span class="text-danger">{{$errors->has('subcategory_name') ? $errors->first('subcategory_name') : ''}}</span>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> Brand Name </label>
                    <div class="col-sm-9">  
                        <select class="form-control" name="brand_id" required>
                            <option value="" disabled selected>--- Select Brand ---</option>
                            @foreach ($brands as $brand)
                            @if ($brand->status == 1)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>  
                            @endif
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label"> Unit Name </label>
                    <div class="col-sm-9">  
                        <select class="form-control" name="unit_id" required>
                            <option value="" disabled selected>--- Select Unit ---</option>
                            @foreach ($units as $unit)
                            @if ($unit->status == 1)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>  
                            @endif
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->has('unit_id') ? $errors->first('unit_id') : ''}}</span>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Name </label>
                    <div class="col-sm-9">  
                      <input type="text" class="form-control" id="horizontal-firstname-input" name="name" required>
                      <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Code </label>
                    <div class="col-sm-9">  
                      <input type="text" class="form-control" id="horizontal-firstname-input" name="code" required>
                      <span class="text-danger">{{$errors->has('code') ? $errors->first() : ''}}</span>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Regular Price </label>
                    <div class="col-sm-9">  
                      <input type="number" class="form-control" id="horizontal-firstname-input" name="regular_price" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Selling Price </label>
                    <div class="col-sm-9">  
                      <input type="number" class="form-control" id="horizontal-firstname-input" name="selling_price" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Product Stock Amount </label>
                    <div class="col-sm-9">  
                      <input type="number" class="form-control" id="horizontal-firstname-input" name="stock_amount" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Product Short Description </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="horizontal-email-input" name="short_description"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Product Long Description </label>
                    <div class="col-sm-9">
                        <textarea class="form-control summernote" id="horizontal-email-input" name="long_description"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3">Product Image</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control-file" id="horizontal-password-input" name="image" accept="image/*">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3">Product Sub Image</label>
                    <div class="col-sm-9">
                      <input type="file" class="form-control-file" id="horizontal-password-input" name="sub_image[]" accept="image/*" multiple>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label for="" class="col-sm-3">Product Status </label>
                    <div class="col-sm-9">
                        <label class="mr-3"><input type="radio"  name="status" value="1" checked>Published</label>
                        <label><input type="radio"  name="status" value="0">Unpublished</label>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Create Product</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection