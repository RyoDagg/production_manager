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

    public function new_client(Request $request)
    {
        // ddd($request->input());
        $client = new Client();

        $client->is_company = $request->input('is_company')? 1 : 0;

        $client->email = $request->input('email'); //name
        $client->name = $request->input('name'); //name
        $client->adresse = $request->input('address'); //description
        $client->tel = $request->input('tel'); //description

         //photo
        //  if ($request->photo) {
        //     $file = $request->photo;
        //     $extenstion = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extenstion;
        //     $file->move('storage/materials/', $filename);
        //     $client->photo = $filename;
        //  }
        $client->save();

        return redirect()->back()->with('status', 'Client Added Successfully');
    }

    //delete client
    public function delete_client($id) {
        $client = Client::find($id);
        $client->delete();

        return back()->with('success', 'Client Deleted!');
    }
}
