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
        // ddd($request->input());
         $purchase = new Purchase();
         
         $purchase->material_id=$request->input('material'); 
         $purchase->fournisseur_id=$request->input('fournisseur'); 
         $purchase->quantity=$request->input('quantite'); 
         $purchase->prix_unit=$request->input('prix_unit');

         $purchase->save();
        // redirect to the purchases page after saving the record
        return redirect()->back();
    }
    }