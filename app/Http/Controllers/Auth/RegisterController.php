<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:6',
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'telephone' => 'required|digits:9',
            'adresse' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,gif|max:2048'
        ]);

        User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'prenom' => $validated['prenom'],
            'nom' => $validated['nom'],
            'telephone' => $validated['telephone'],
            'adresse' => $validated['adresse'],
            'photo' => $request->hasFile('photo') ?
                $request->file('photo')->store('users', 'public')
                : null,
            'profile_id' => 1
        ]);

        return redirect()->route('login.form')->with('success', 'Inscription reussie avec succes.');
    }
}
