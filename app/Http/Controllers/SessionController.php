<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{


	public function create(){


		return view('session.create');
	}

	public function store(){
		//validate the request
		$attributes = request()->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);
		//attempt to authentifcate and log in the user
		//based on the provided credentials
		if(!auth()->attempt($attributes)){
			//auth failed
			throw ValidationException::withMessages([
			'email' => 'Your provided credentials could not be verified.'
			]);
		}
			//session regeneration
			session()->regenerate();
			//redirect with a success flash message!
			return redirect('/');
			//return back()->withErrors(['email' => 'Your provided credentials could //not be verified.']); //$errors
		
	}	
    public function destroy(){

    	auth()->logout();

    	return redirect("/");
    }
}
