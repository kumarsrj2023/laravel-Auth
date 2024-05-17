<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showRegisterPage()
    {
        return view('Auth.signup');
    }
    public function showLoginPage()
    {
        return view('Auth/Login');
    }

    public function register(Request $request)
    {
        // return $request;
        $credentional = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $emailExists =  User::whereEmail($credentional['email'])->get();

        if (count($emailExists) > 0) {
            session()->flash('message', 'Email already exists');
            return redirect()->route('user.showLoginPage');
        } else {
            $registered = User::create($credentional);

            session()->flash('message', 'Registered successful');
            return view('Auth.login');
        }
    }

    public function login(Request $request)
    {
        $credentional = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentional)){
            return redirect()->route('home');
        } else {
            session()->flash('message', 'incorrect details');
            return redirect()->route('user.showLoginPage');
        }
    }
    
}
