<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;


use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function get_sales()
    {
        $sale= Sale::orderBy('created_at', 'DESC')->get();
        $client=Client::all();
        $product=Product::all();
        return view('tables.sales')->with('sales', $sale)
                                    ->with('clients',$client)
                                    ->with('products',$product)
                                
            ;}
    //new sale
    public function new_sale(Request $request){
        $existent = Sale::where('client_id', $request->get('client_id'))->where('status', null)->get();

        if($existent->count()) {
            return back()->withError('There is already an unfinished sale belonging to this customer. <a href="'.route('tables.sales', $existent->first()).'">Click here to go to it</a>');
        }

        $sale = new Sale();
         
            $sale->product_id=$request->input('product'); 
            $sale->client_id=$request->input('client'); 
            $sale->quantity=$request->input('quantite'); 
            $sale->prix_unit=$request->input('prix_unit');
    
             $sale->save();
        
        return redirect()->back()
            ->withStatus('Sale registered successfully.');
    }
    //     // ddd($request->input());
    //      $sale = new Sale();
         
    //      $sale->product_id=$request->input('product'); 
    //      $sale->client_id=$request->input('client'); 
    //      $sale->quantity=$request->input('quantite'); 
    //      $sale->prix_unit=$request->input('prix_unit');

    //      $sale->save();
    //     // redirect to the sales page after saving the record
    //     return redirect()->back();

   
}
    