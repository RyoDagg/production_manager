<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseursController extends Controller
{
    public function get_fournisseurs()
    {
        $fournisseur= Fournisseur::orderBy('created_at', 'DESC')->get();
     
        return view('tables.fournisseurs')->with('fournisseurs', $fournisseur)
                                
            ;}
}
