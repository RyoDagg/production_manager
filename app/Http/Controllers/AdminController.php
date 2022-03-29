<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function get_products()
    {
        return view('products');
    }

    public function get_materials()
    {
        return view('materials');
    }

    public function get_purchases()
    {
        return view('purchases');
    }

    public function get_sales()
    {
        return view('sales');
    }

    public function get_production()
    {
        return view('production');
    }

    public function get_users()
    {
        return view('users');
    }
}
