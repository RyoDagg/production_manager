<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function get_production()
    {
        return view('tables.production');
    }
}
