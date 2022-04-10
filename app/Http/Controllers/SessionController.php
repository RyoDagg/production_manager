<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{

		
    public function destroy(){

    	auth()->logout();

    	return redirect("/");
    }
}
