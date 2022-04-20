<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Materials;
use App\Models\Purchase;


use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function get_purchases()
    {
        $purchase = Purchase::orderBy('created_at', 'DESC')->get();
        $fournisseur = Fournisseur::all();
        $material = Materials::all();

        return view('tables.purchases')->with('purchases', $purchase)
            ->with('fournisseurs', $fournisseur)
            ->with('materials', $material);
    }
    //new purchase
    public function new_purchase(Request $request)
    {

        $existent = Purchase::where('fournisseur_id', $request->get('fournisseur_id'))->where('status', null)->get();

        if ($existent->count()) {
            return back()->withError('There is already an unfinished purchase assigned to this supplier. <a href="' . route('tables.fournisseurs', $existent->first()) . '">Click here to go to it</a>');
        }


        // ddd($request->input());
        $purchase = new Purchase();

        $purchase->material_id = $request->input('material');
        $purchase->fournisseur_id = $request->input('fournisseur');
        $purchase->quantity = $request->input('quantity');
        $purchase->prix_unit = $request->input('unitPrice');

        $purchase->prix_tot = $purchase->quantity * $purchase->prix_unit;



        $purchase->save();
        // $purchase->materials->stock += $purchase->quantity;
        // $purchase->materials->save();
        // redirect to the purchases page after saving the record
        return redirect()->back();
    }

    public function view_purchase($id)
    {
        $purchase = Purchase::find($id);
        return view('tables.purchase', ['purchase' => $purchase]);
    }

    public function delete_purchase($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();

        return back()->with('success', 'Purchase Deleted!');
    }

    public function validate_purchase($id, $action)
    {
        // ddd($id, $action);
        $purchase = Purchase::find($id);
        if ($purchase->status == 'pending') {
            $purchase->status  = $action;
            if ($action == 'accepted') {
                $purchase->materials->stock  += $purchase->quantity;
                // ddd( $purchase->products->stock );
            }
            $purchase->materials->save();

            $purchase->save();
            return redirect()->back()->with('status','Purchase '.$action.' successfully!!');
        }
        return redirect()->back()->with('fail');
    }

    public function purchase_reports(){

        return view('reports.purchases');
    }
}
