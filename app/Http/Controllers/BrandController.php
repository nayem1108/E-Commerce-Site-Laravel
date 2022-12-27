<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function manage()
    {
        $this->brand = Brand::all();
        return view('admin.brand.manage', ['brands'=>$this->brand]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:brands'
        ],

        //custom mesage
        [
            'name.required' => ' ** This field is required',
            'name.unique' => 'The Brand has already been taken.'
        ]
    );

        Brand::addBrand($request);
        return redirect('/manage-brand')->with('message', 'New Brand Added...');
    }

    public function edit($id){
        $this->brand = Brand::find($id);
        return view('admin.brand.update', ['brand' =>$this->brand]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateInfo($request, $id);
        return redirect('/manage-brand')->with('message', 'Update Successfull..');

    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect()->back()->with('message', 'Brand deleted..');
    }
}
