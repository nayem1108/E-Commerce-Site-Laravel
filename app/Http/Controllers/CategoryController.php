<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    private $category;
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:categories'
        ]);

        Category::newCategory($request);
        //return redirect('/manage-category')->with('message', 'New category Created..');
        return redirect()->back();
    }

    public function manage()
    {
        $this->category = Category::all();
        return view('admin.category.manage',['categories'=>$this->category]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view('admin.category.update', ['category'=>$this->category]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/manage-category')->with('message', 'Update Successfull..');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect()->back()->with('message', 'Category Delete Successfull...');
    }

}
