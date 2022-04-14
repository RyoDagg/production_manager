<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function get_production()
    {
        $products = Product::all();
        $production= Production::orderBy('created_at', 'DESC')->get();
        return view('tables.production')->with('productions', $production)
                                        ->with('products', $products);
    }
}
