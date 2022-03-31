<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function get_materials()
    {
        return view('tables.materials');
    }

}
