<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //

    public function index(Request $request, $id)
    {
        $product = Product::find($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->selling_price,
            'quantity' => $request->qty,
            'attributes' => [
                'image' => $product->image,
            ]
        ]);

        return redirect('/show-cart');
    }


    public function showCart(){
        // $product = Cart::getContent();
        return view('website.cart.show-cart', [
            'cartProducts' => Cart::getContent()
        ]);
    }


    public function removeItem($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('message', 'Item removed successfully...');
    }

    public function updateQuantity(Request $request, $id)
    {
        Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $request->qty,
                ],
        ]);

        return redirect()->back();
    }



    // public function indaddtocartAjaxex(Request $request)
    // {
    //     $id = $_POST['id'];
    //     $product = Product::find($id);
    //     Cart::add([
    //         'id' => $product->id,
    //         'name' => $product->name,
    //         'price' => $product->selling_price,
    //         'quantity' => $request->qty,
    //         'attributes' => [
    //             'image' => $product->image,
    //         ]
    //     ]);

    //     return response()->json($product);
    // }
}
