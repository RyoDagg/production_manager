<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function get_sales()
    {
        return view('tables.sales');
    }
    public function get_invoices()
    {
        return view('tables.invoices');
    }
}
