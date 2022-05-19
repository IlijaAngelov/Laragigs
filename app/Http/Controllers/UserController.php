<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create()
    {
        return view('users.register');
    }

    // Store User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
//            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
//        auth()->login($user);
        Auth::login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
//        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();;

        return redirect('/')->with('message', 'You have been logged out!');
    }

}
