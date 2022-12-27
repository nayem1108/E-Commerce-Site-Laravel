<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $this->category = Category::all();
        return view('admin.sub-category.index', ['categories' => $this->category]);
    }

    public function manage()
    {
        $this->subcategory = Subcategory::all();
        return view('admin.sub-category.manage', ['subcategories'=>$this->subcategory]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:subcategories'
        ]);
        
        Subcategory::createSubcategory($request);
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('admin.sub-category.edit', ['subcategory' => Subcategory::find($id)]);
    }

    public function update(Request $request,$id)
    {
        // return $request->all();
        Subcategory::updateSubcategory($request, $id);
        return redirect('/manage-subcategory')->with('message', 'update successfull');    
    }

    public function delete($id)
    {
        Subcategory::deleteSubCategory($id);
        return redirect('/manage-sub-category')->with('message', 'Subcategory Deleted...');
    }

}
