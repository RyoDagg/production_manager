<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Sale;
use App\Service\InvoiceService;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function get_invoices(Invoice $invoice){
        $invoice = Invoice::orderBy('created_at', 'DESC')->get();
        $sale = Sale::all();

        return view('tables.invoices')->with('invoices', $invoice)
                                      ->with('sales',$sale)
    }
}
