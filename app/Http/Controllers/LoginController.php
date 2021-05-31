<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function authenticate(Request $request){

        $creds = $request->validate([
           'email' => ['required','email'],
           'password'=>['required'],
        ]);


        if(Auth::attempt($creds)) {
            $request->session()->regenerate();
            return redirect()->intended('welcome');
        }

          return back()->withErrors([
            'email'=>'Account not found',
            'password'=>'Login Credentials Incorrect'


          ]);

        }












}
