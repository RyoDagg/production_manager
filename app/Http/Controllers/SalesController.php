<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function get_sales()
    {
        return view('tables.sales');
    }
}
