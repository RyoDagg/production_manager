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
        $purchase= Purchase::orderBy('created_at', 'DESC')->get();
        $fournissuer= Fournisseur::all();
        $material= Materials::all();

        return view('tables.purchases')->with('purchases', $purchase)
                                       ->with('fournisseurs',$fournissuer)
                                       ->with('materials',$material)
                                
            ;}
        //new purchase
    public function new_purchase(Request $request){
        $existent = Purchase::where('fournisseur_id', $request->get('fournisseur_id'))->where('status', null)->get();

        if($existent->count()) {
            return back()->withError('There is already an unfinished purchase assigned to this supplier. <a href="'.route('tables.fournisseurs', $existent->first()).'">Click here to go to it</a>');
        }
        
         $purchase = new Purchase();
         
         $purchase->material_id=$request->input('material'); 
         $purchase->fournisseur_id=$request->input('fournisseur'); 
         $purchase->quantity=$request->input('quantite'); 
         $purchase->prix_unit=$request->input('prix_unit');
         $purchase->prix_tot=$purchase->quantity * $purchase->prix_unit;

         $purchase->save();
        // redirect to the purchases page after saving the record
        return redirect()->back();
    }
    public function view_purchase(Purchase $purchase)
    {
        return view('tables.purchases', ['purchase' => $purchase]);
    }

    // public function delete_purchase(Purchase $purchase)
    // {
    //     $purchase->delete();

    //     return redirect()
    //         ->route('tables.purchases')
    //         ->withStatus('The purchase record has been successfully deleted.');
    // }
    }