<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Materials;
use App\Models\Unit;
use Illuminate\Validation\Rule;


use Illuminate\Http\Request;

class MaterialsController extends Controller
{
    public function get_materials(Materials $material)
    {
        $material = Materials::orderBy('created_at', 'DESC')->get();
        $unit = Unit::all();
        $fournisseur = Fournisseur::all();
        return view('tables.materials')->with('materials', $material)
            ->with('units', $unit)
            ->with('fournisseurs', $fournisseur);
        //return ddd($material);
    }
    //new material
    public function new_material(Request $request)
    {
        $material = new Materials();

        $material->name = $request->input('name'); //name
        $material->unit_id = $request->input('unit'); //unit
        $material->description = $request->input('description'); //description
        //photo
        if ($request->photo) {
            $file = $request->photo;
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('storage/materials/', $filename);
            $material->photo = $filename;
        }
        //submit material
        $material->save();
        // redirect to the materials page after saving the record
        return redirect()->back()->with('status', 'Material Added Successfully');
        // return $request->all();


    }
    //view material
    public function show_material($id)
    {
        $material = Materials::where('id', $id)->firstorFail();

        return view('materials.show')->with([
            'material' => $material
        ]);
    }
    //edit material
    public function edit_material(Materials $material)
    {

        return view('materials.edit', ['material' => $material]);
    }

    //delete material
    public function delete_material($id) {
        $material = Materials::find($id);
        $material->delete();

        return back()->with('success', 'Material Deleted!');
    }
}
