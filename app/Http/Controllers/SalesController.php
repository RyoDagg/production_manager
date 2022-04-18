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
        $sale = Sale::orderBy('created_at', 'DESC')->get();
        $client = Client::all();
        $product = Product::all();
        // $sale = $sale ->load(['clients']);
        return view('tables.sales')->with('sales', $sale)
            ->with('clients', $client)
            ->with('products', $product);
    }

    // public function get_invoices()
    // {
    //     return view('tables.invoices');
    // }

    //new sale
    public function new_sale(Request $request)
    {
        // ddd($request->get('quantity'));

        $existent = Sale::where('client_id', $request->get('client_id'))->where('status', 'pending')->get();

        if ($existent->count()) {
            return back()->withError('There is already an unfinished sale belonging to this customer. <a href="' . route('tables.sales', $existent->first()) . '">Click here to go to it</a>');
        }

        $sale = new Sale();

        $sale->product_id = $request->input('product');
        $sale->client_id = $request->input('client');
        $sale->quantity = $request->input('quantity');
        $sale->prix_unit = $request->input('unitPrice');

        $sale->prix_tot = $sale->quantity * $sale->prix_unit;

        // foreach ($sale->products as $sold_product) {
        //     $product_name = $sold_product->product->name;
        //     $product_stock = $sold_product->product->stock;
        //     if($sold_product->qty > $product_stock) return back()->withError("The product '$product_name' does not have enough stock. Only has $product_stock units.");
        // }

        // foreach ($sale->products as $sold_product) {
        //     $sold_product->product->stock -= $sold_product->qty;
        //     $sold_product->product->save();
        // }

        $sale->save();

        return redirect()->back()
            ->withStatus('Sale registered successfully.');
    }

    public function view_sale($id)
    {
        $sale = Sale::find($id);
        return view('tables.sale', ['sale' => $sale]);
    }

    public function delete_sale($id)
    {
        $sale = Sale::find($id);
        $sale->delete();

        return back()->with('success', 'Sale Deleted!');
    }

    public function validate_sale($id, $action)
    {
        // ddd($id, $action);
        $sale = Sale::find($id);
        if ($sale->status == 'pending') {
            $sale->status  = $action;
            if ($action == 'accepted') {
                $sale->products->stock  -= $sale->quantity;
                // ddd( $sale->products->stock );
            }
            $sale->products->save();

            $sale->save();
            return redirect()->back()->with('status','Sale '.$action.' successfully!!');
        }
        return redirect()->back()->with('fail');
    }
}
