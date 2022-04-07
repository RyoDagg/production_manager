<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products(Product $product)
    {
        $product= Product::orderBy('created_at', 'DESC')->get();
        return view('tables.products')->with('products', $product);
    }
    public function new_product(Request $request){
        // ddd($request->input());
         $product = new Product();
         
         $product->name=$request->input('name'); //name
         $product->stock=$request->input('quantite'); //quantite
         $product->description=$request->input('description'); //description
         //photo
        if($request->photo){
            $file = $request->photo;
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move('storage/materials/', $filename);
                $product->photo = $filename;
            }
         //submit material
        $product->save();
        // redirect to the materials page after saving the record
        return redirect()->back()->with('status','Material Added Successfully');
    }
}