<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Registration extends Controller
{
    public function create(){
        return view('registration.create');
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(): \Illuminate\Http\RedirectResponse
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/welcome');
    }
}
