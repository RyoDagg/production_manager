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

    public function new_production(Request $request)
    {

        // $existent = Product::where('fournisseur_id', $request->get('fournisseur_id'))->where('status', null)->get();

        // if ($existent->count()) {
        //     return back()->withError('There is already an unfinished purchase assigned to this supplier. <a href="' . route('tables.fournisseurs', $existent->first()) . '">Click here to go to it</a>');
        // }


        // ddd($request->input());
        $production = new Production();

        $production->product_id = $request->input('product');
        $production->quantity = $request->input('quantity');
        
        $production->save();
        return redirect()->back();
    }
}
