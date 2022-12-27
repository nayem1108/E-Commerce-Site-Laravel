<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    //

    public function login(){
        return view('website.customer.login');

    }

    public function loginRequest(Request $request){
        // return $request->all();
        $customer = Customer::where('email',$request->email)->get()->first();

        if($customer){
            if($customer->password == $request->password){
                Session::put('customer_id', $customer->id);
                Session::put('customer_name', $customer->name);
                return redirect('/my-dashboard');
            }
            return redirect()->back()->with('password-message', 'Password not match');
        }

        return redirect()->back()->with('email-message', 'Email is invalid');
    }

    public function register(){
        return view('website.customer.register');

    }

    public function logout(){

        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');

    }


    public function newCustomer(Request $request){
        // return $request->all();
        $customer = Customer::newCustomer($request);
        Session::put('customer_id', $customer->id);
        Session::put('customer_name', $customer->name);
        return redirect('my-dashboard');
    }
}
