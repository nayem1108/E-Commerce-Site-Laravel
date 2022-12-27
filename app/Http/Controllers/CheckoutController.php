<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;
use Cart;

class CheckoutController extends Controller
{
    //

    public function checkout()
    {
        return view('website.cart.checkout');
    }

    public function newOrderCheckout(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => ['required', 'unique:customers'],
            'contact_number' => ['required', 'unique:customers'],
            'delivery_address' => 'required',
            'payment_method' => 'required'
        ],

        ['payment_method.required' => '** Payment not selected',]);


        // return Session::get('total_amount');

        $customer = Customer::newCustomer($request);

        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customer->name);

        $order_id = Order::newOrder($request->delivery_address, $request->payment_method, $customer->id);

        OrderDetail::newOrderDetails($order_id);

        foreach(Cart::getContent() as $cartProduct){
            Cart::remove($cartProduct->id);
        }

        return redirect('/my-dashboard')->with('message', 'Order Placed Successfully. We will contact you soon.....');
    }
}
