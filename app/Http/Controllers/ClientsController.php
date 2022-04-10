<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function get_clients(Client $client)
    {
        $client= Client::orderBy('created_at', 'DESC')->get();
     
        return view('tables.clients')->with('clients', $client)
                                
            ;}
}
