<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function get_purchases()
    {
        return view('tables.purchases');
    }
}
