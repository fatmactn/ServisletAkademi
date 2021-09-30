<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserAuth;

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
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);

        //UserAuth::create($request->post());

        $user = new UserAuth();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $query = $user->save();

        if ($query) {
            return back()->with('success','You have been successfuly registered');
        }
        else {
            return back()->with('fail','Failed!');
        }
    }

    function check(Request $request) {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5'
        ]);

        $user = UserAuth::where('email','=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                if ($request->status == 1) {
                    return back()->with('success','You have been successfuly logined');
                }
                else {
                    return back()->with('fail','You are not authorized!');
                }
            }
            else {
                return back()->with('fail','Invalid password!');
            }
        }
        else {
            return back()->with('fail','Account is not found!');
        }
    }

}
