<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index');
    }

    public function show($product)
    {
        return view('shop.show');
    }

    public function customize($product)
    {
        return view('shop.customize');
    }
}
