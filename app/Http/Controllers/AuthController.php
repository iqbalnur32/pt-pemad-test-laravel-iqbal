<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return view('login.index');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:2'
        ]);

        // Check Email Kalau belum ada akan register dan login sendiri
        $checkEmail = User::where('email', $request->email)->first();
        if (!$checkEmail) {
            $user = new User();
            $user->email    = $request->email;
            $user->password = \Hash::make($request->password);
            $user->username = explode('@', $request->email)[0];
            $user->role     = 'admin';
            $user->save(); 
        }

        if (auth()->guard('user')->attempt($request->only('email', 'password'))) {
            return redirect('/users');
        } else {
           return redirect('/')->with('error', 'Email atau Password Salah');
        }
    }

    public function logout() {
        auth()->guard('user')->logout();
        return redirect('/');
    }
}
