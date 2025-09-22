<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Sale;

class InvoiceController extends Controller
{
    public function get_invoices(Invoice $invoice){
        $invoice = Invoice::orderBy('created_at', 'DESC')->get();
        $sale = Sale::all();
        $client = Client::all();

        return view('tables.invoices')->with('invoices', $invoice)
                                      ->with('sales',$sale)
                                      ->with('clients',$client);                             
    }
}
