<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products()
    {
        return view('tables.products');
    }
}
