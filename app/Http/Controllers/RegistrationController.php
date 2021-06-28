<?php
/*
 * 15/05/2021
 * @author Mark Redmond x16355811
 */

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Exception;

class RegistrationController extends Controller
{
    //shows the registration view
    public function create(){
        return view('registration');
    }

    //This function is the registration function, it takes the user information, validates it, and stores in the database
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
