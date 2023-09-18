<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
//        User::create([
//            'name' => 'Diam Diallo',
//            'email' => 'diamil@gmail.com',
//            'password' => Hash::make('1234'),
//        ]);
        return view('authentication.login');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required',
        ]);

//        dd($credentials);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->with([
            'error' => 'Login ou mot de passe inccorect'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}
