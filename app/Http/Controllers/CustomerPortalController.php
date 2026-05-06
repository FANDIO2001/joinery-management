<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPortalController extends Controller
{
    public function dashboard()
    {
        return view('customer.dashboard');
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function addresses()
    {
        return view('customer.addresses');
    }
}
