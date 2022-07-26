<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function view_profile()
    {
        return view('profile.view');
    }
    public function edit_profile()
    {
        return view('profile.edit');
    }

    public function updateProfile(Request $req) {

        $user=Auth::user(); 
        Profile::updated ([ 
           'avatar' => $req->avatar,
           'fullName' => $req->fullName,
           'email' => $req->email,
           'numTel'=>$req->numTel,
           'address'=> $req->address,
           'birthday'=> $req->birthday,
           'numCnss'=>$req->numCnss,
          ]);
          $user->save() ;      
         return redirect() -> back()->with('succes','okey') ;
       }

}
