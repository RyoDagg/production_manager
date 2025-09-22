<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use App\Models\Product;
use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function get_production()
    {
        $products = Product::all();
        $materials = [];
        foreach ($products as $product) {
            $mats = [];
            foreach ($product->materials as $material) {
                $mat = [
                    'name' => $material->name,
                    'quant' => $material->pivot->quantity,
                    'stock' => $material->stock,
                    'unit' => $material->units->symbole,
                ];
                array_push($mats, $mat);
            }
            $materials[$product->id] = $mats;
        }
        // ddd($materials);
        $production= Production::orderBy('created_at', 'DESC')->get();
        return view('tables.productions')
            ->with('productions', $production)
            ->with('products', $products)
            ->with('materials', $materials);

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

    public function view_production($id)
    {
        $production = Production::find($id);
        return view('tables.production', ['production' => $production]);
    }

    public function validate_production($id, $action)
    {
        $production = Production::find($id);
        if (($production->status = 'pending') && ($action != 'completed')) {
            $production->status  = $action;
            if ($action == 'progress') {
                foreach ($production->products->materials as $material) {
                    $cost = $material->pivot->quantity * $production->quantity;
                    $material->stock -= $cost;
                    $material->save();
                }
            }

            $production->save();
            return redirect()->back()->with('status','Production '.$action.' successfully!!');
        }
        return redirect()->back()->with('fail');
    }

    public function complete_production($id)
    {
        $production = Production::find($id);
        if ($production->status = 'progress') {
            $production->status  = 'completed';
            $product = $production->products;
            $product->stock += $production->quantity;
            $production->save();
            $product->save();
            return redirect()->back()->with('status','Production Completed successfully!!');
        }
        return redirect()->back()->with('fail');
    }

    public function delete_production($id) {
        $production = Production::find($id);
        $production->delete();

        return back()->with('success', 'Production Deleted!');
    }
}
