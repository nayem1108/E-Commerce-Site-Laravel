<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\SubImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // return Product::orderBy('id', 'desc')->take(4)->get(['id', 'name', 'selling_price', 'image', 'category_id', 'sub_category_id']);

        return view('website.home.home', [
            'products' => Product::orderBy('id', 'desc')->take(4)->get(['id', 'name', 'selling_price', 'image', 'category_id', 'subcategory_id'])
        ]);
    }

    public function category($id)
    {   
        return view('website.category.category', [
            'category' => Category::find($id),
            'categoryProducts' => Product::where('category_id', $id)->orderBy('id', 'desc')->get()
        ]);
    }

    public function subcategoryProduct($id)
    {
        
        $categoryId = Subcategory::where('id', $id)->get(['category_id']);

        return view('website.subcategory.index', [
            'category' => Category::find($categoryId),
            'subcategory' => Subcategory::find($id),
            'subcategoryProducts' => Product::where('subcategory_id', $id)->orderBy('id', 'desc')->get()
        ]);
    }

    public function brandProducts($id){

        return view('website.brand.brand', [
            'brandProducts' => Product::where('brand_id', $id)->get(),
            'brand' => Brand::find($id)
        ]);
    }

    public function details($id)
    {
        return view('website.product.detail', [ 
            'product' => Product::find($id),
            'subimages' => SubImage::where('product_id', $id)
        ]);
    }
}
