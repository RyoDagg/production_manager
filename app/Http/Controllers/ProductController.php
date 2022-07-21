<?php

namespace App\Http\Controllers;

use App\Models\Materials;
use App\Models\Product;
use App\Models\ProductMaterial;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products(Product $product)

    {
        $product= Product::orderBy('created_at', 'DESC')->get();
        $materials= Materials::all();
        return view('tables.products')->with('products', $product)
                                      ->with('materials', $materials);
    }

    //Store a newly created resource in storage.
    public function store(Request $request, Product $model)
    {
        $model->create($request->all());

        return redirect()
            ->route('tables.products')
            ->withStatus('Product successfully registered.');
    }
    public function edit_product(Request $request){

        ddd($request->all());

        return redirect()
            ->route('products')
            ->withStatus('Product updated successfully.');
    }



    public function new_product(Request $request)
    {
        // ddd(($request->input()));
        $product = new Product();

        $product->name = $request->input('name'); //name
        $product->stock	= "0"; //quantite
        $product->description = $request->input('description'); //description
        //photo
        if ($request->photo) {
            $file = $request->photo;
            $extenstion = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extenstion;
            $file->move('storage/materials/', $filename);
            $product->photo = $filename;
        }
        $product->save();

        //submit material
        $mats = $request->input('material');
        $quantity = $request->input('quanity');
        $count = count($mats);
        for ($i=0; $i <$count ; $i++) { 
            $prodmat = new ProductMaterial();
            $prodmat->product_id = $product->id;
            $prodmat->material_id = $mats[$i];
            $prodmat->quantity	= $quantity[$i];
            $prodmat->save();
        }
        
        // redirect to the materials page after saving the record
        return redirect()->back()->with('status', 'Material Added Successfully');

    }

    //delete product
    public function delete_product($id) {
        $product = Product::find($id);
        $product->delete();

        return back()->with('success', 'Product Deleted!');
    }
}