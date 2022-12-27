<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\SubImage;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private $categories;
    private $subcategories;
    private $brands;
    private $units;
    private $product;

    public function index()
    {
        $this->categories = Category::all();
        $this->subcategories = Subcategory::all();
        $this->brands = Brand::all();
        $this->units = Unit::all();

        return view('admin.product.index', [
            'categories'    => $this->categories,
            'subcategories' =>$this->subcategories,
            'brands'        =>$this->brands,
            'units'         =>$this->units,
        ]);
    }


    public function create(Request $request)
    {
        
        $request->validate([
            'category_id'       => 'required',
            'subcategory_id'    =>'required',
            'brand_id'          =>'required',
            'unit_id'           =>'required',
            'name'              => ['required', 'unique:products'],
            'code'              => ['required', 'unique:products'],
            'selling_price'     => 'required',
            'stock_amount'      => 'required',
            'image'             => 'required | image'

        ]);

        $this->product = Product::createProduct($request);

        if($request->file('sub_image'))
            SubImage::createSubImage($this->product, $request->file('sub_image'));

        return redirect()->back();
    }
    

    public function getSubcategory()
    {
        $categoryId = $_GET['id'];
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }
    
    public function manage()
    {
        $this->product = Product::all();
        return view('admin.product.manage',['products'=>$this->product]);
    }

    public function edit($id)
    {
        $this->product = Product::find($id);
        return view('admin.product.edit', [
            'product'  =>$this->product,
            'categories'    =>Category::all(),
            'subCategories'    =>Subcategory::all(),
            'brands'    =>Brand::all(),
            'units'    =>Unit::all(),
            'subImages' =>SubImage::where('product_id', $this->product->id)->get()
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->product = Product::updateProduct($request, $id);
        if($request->file('sub_image'))
        {
            SubImage::updateSubImage($this->product, $request->file('sub_image'));
        }
        return redirect('/manage-product')->with('message', 'Update Successfull..');
    }

    public function delete($id)
    {
        Product::deleteProduct($id);
        return redirect()->back()->with('message', 'Category Delete Successfull...');
    }

    public function viewDetails($id)
    {
        $this->product = Product::find($id);
        $this->subImages = SubImage::all();
        return view('admin.product.details', ['product' => $this->product, 'subImages' =>$this->subImages]);
    }
}
