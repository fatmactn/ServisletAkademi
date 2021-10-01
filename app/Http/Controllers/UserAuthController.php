<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);

        $request->merge(['password' => Hash::make(request('password'))]);
        User::create($request->except('_token'));

        return redirect()->back()->with('success', 'You have been successfully registered');
    }

    function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin')
                ->withSuccess('Signed in');
        } else {
            return redirect('login')->with('fail', 'You are not authorized');
        }
    }

    function admin()
    {
        if (!Auth::check()) {
            return redirect('login')->with('fail', 'You are not logged in');
        } elseif (auth()->user()->status !== 1) {
            return redirect('login')->with('fail', 'You are not authorized');
        } else {
            return view('admin.admin');
        }

    }

    function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('login');
        }
    }

}
