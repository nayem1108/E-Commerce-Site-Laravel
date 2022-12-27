<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CustomerDashboardController extends Controller
{
    //
    public function dashboard()
    {
        if(Session::get('customer_id'))
            return view('website.customer.dashboard.dashboard');
        else
            return redirect('/');
    }

    public function my_profile()
    {
        return view('website.customer.dashboard.profile');
    }
}
