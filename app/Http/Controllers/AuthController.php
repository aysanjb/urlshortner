<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');

    }
    public function registerPost(Request $request)
    {
        $user = new User();
        $user->username =$request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Registered successfully');

    }
    public function login(){
        return view('login');
    }
    public function loginPost(Request $request){
        $credentials=[
            'username'=>$request->username,
            'password'=>$request->password,
        ];
        if (Auth::attempt($credentials)){
            return redirect('home')->with ('success', 'login was successful');
        }
        return back()->with('error', 'username or password was not correct');

        }


}
