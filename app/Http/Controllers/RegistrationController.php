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
                    'min:8',
                ],
            ]);

            $user = User::create(request(['name', 'email', 'password']));

            auth()->login($user);

            return redirect()->to('/welcome');
        }
        catch(Exception $exception){
            return back()->withError($exception->getMessage())->withInput();


        }
    }
}
