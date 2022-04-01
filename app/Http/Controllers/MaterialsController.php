<?php

namespace App\Http\Controllers;
use App\Models\Materials;

use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function get_materials(Materials $material)
    {
        $material= Materials::orderBy('created_at', 'DESC')->get();

        return view('tables.materials')->with('materials', $material);
            //return ddd($material);
    }

}
