<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //    Register    //
    public function register()
    {
        return view('auth.register');
    }

    public  function store()
    {
        // valisation
        $validated = request()->validate(
            [
                'name' => 'required|min:2|max:40',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:8'
            ]
        );

        // create the user
        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]
        );

        // Mail::to($user->email)->send(new WelcomeEmail($user));

        // redirect
        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }


    //    Login    //
    public function login()
    {
        return view('auth.login');
    }

    public  function authenticate()
    {
        // valisation
        $validated = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]
        );

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'password' => 'No matching user found with the provided email or password'
        ]);
    }


    //    Logout    //
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'logged out successfully!');
    }
}
