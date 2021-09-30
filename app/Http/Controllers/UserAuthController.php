<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);

        User::create($request->post());
        return back()->with('success','You have been successfuly registered');
    }

    function check(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin')
                ->withSuccess('Signed in');
        }
        else {
            return redirect()->back()->with('fail','You are not authorized');
        }
    }

    function admin() {
        if (!Auth::check()){
            return redirect()->back()->with('fail','You are not logged in');
        }
        elseif(auth()->user()->status !== 1 )
        {
            return redirect()->back()->with('fail','You are not authorized');
        }
        else
        {
            return view('admin.admin');
        }

    }

    function logout() {
        if(Auth::check()) {
            Auth::logout();
            return redirect('login');
        }
    }

}
