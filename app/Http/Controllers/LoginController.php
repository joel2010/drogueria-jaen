<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $credentials  = $request->validate([
            'email' => [
                'required',
                'max:200',
                'email',
            ],
            'password' => [
                'required',
                'min:6',
            ],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withInput()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }
}
