<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(){
        return view('registration');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required'],
            'email'=>['required','email'],
            'password' => [
                'required',
                'confirmed',
            ],
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/welcome');
    }
}
