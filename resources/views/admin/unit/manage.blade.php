@extends('admin.master')

@section('title')
    Manage Unit
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Manage Unit</h4>
                <a href="{{route('add-unit')}}" class="mt-3 btn btn-primary btn-md mb-3">Add New Unit</a>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Unit Name</th>
                        <th>Unit Code</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach ($units as $unit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$unit->name}}</td>
                            <span class="text-danger">{{$errors->has('name') ? $errors->first() : ''}}</span>
                            <td>{{$unit->code}}</td>
                            <span class="text-danger">{{$errors->has('code') ? $errors->first() : ''}}</span>
                            <td>{{$unit->description}}</td>
                            <td>{{$unit->status ==  1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="" class="btn btn-success btn-md">
                                <i class="fa fa-edit"></i></a>
                                <a href="{{route('unit.delete', ['id' => $unit->id])}}" class="btn btn-danger btn-md" onclick="confirm('Are you sure to delete this brand?')">
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