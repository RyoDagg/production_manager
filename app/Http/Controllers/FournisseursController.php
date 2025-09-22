<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseursController extends Controller
{
    public function get_fournisseurs()
    {
        $fournisseur = Fournisseur::orderBy('created_at', 'DESC')->get();
        return view('tables.fournisseurs')->with('fournisseurs', $fournisseur);
    }

    public function new_supplier(Request $request)
    {
        // ddd($request->input());
        $supplier = new Fournisseur();

        $supplier->is_company = $request->input('is_company')? 1 : 0;

        $supplier->email = $request->input('email'); 
        $supplier->name = $request->input('name'); //name
        $supplier->adresse = $request->input('address');
        $supplier->tel = $request->input('tel'); 

        $supplier->save();
        // redirect to the materials page after saving the record
        return redirect()->back()->with('status', 'Supplier Added Successfully');
    }

    //delete supplier
    public function delete_fournisseur($id) {
        $fournisseur = Fournisseur::find($id);
        $fournisseur->delete();

        return back()->with('success', 'Supplier Deleted!');
    }
}
