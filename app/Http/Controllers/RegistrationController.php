<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Exception;

class RegistrationController extends Controller
{
    public function create(){
        return view('registration');
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email'],
                'password' => [
                    'required',
                    'confirmed',
                ],
            ]);

            $user = User::create(request(['name', 'email', 'password']));

            auth()->login($user);

            return redirect()->to('/welcome');
        }
        catch(Exception $exception){
            return back()->withError('Registration failed, account with this email address already exists!')->withInput();


        }
    }
}
