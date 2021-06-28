<?php
/*
 * 15/05/2021
 * @author Mark Redmond x16355811
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //old login controller, from before Laravel Fortify took over auth
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
