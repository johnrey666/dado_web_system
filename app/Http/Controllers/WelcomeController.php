<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if (Auth::user()->role == 'user') {
                return redirect()->intended('home');
            } else {
                // Redirect to another route if the role is not 'user'
                return redirect()->intended('admin');
            }
        } else {
            return redirect()->back()->with('error', 'No User Found');
        }
    }

    public function showSignupForm()
{
    return view('register'); // Make sure you have a signup.blade.php view file
}
    
    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,user',
        ]);
    
        $validatedData['password'] = bcrypt($validatedData['password']);
    
        $user = User::create($validatedData);
    
        Auth::login($user);
    
        if (Auth::user()->role == 'user') {
            return redirect()->intended('home');
        } else {
            // Redirect to another route if the role is not 'user'
            return redirect()->intended('admin');
        }
    }
}





