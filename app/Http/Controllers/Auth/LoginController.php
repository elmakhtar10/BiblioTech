<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('reservations.index');
    }
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials = $request->only('email','password');
        $remember = $request->boolean('remember');
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('reservation'));
        }
        return back()->with('error', 'Mot de passe ou email invalide.')->withInput();
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }
}
