<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        
        $request->validate([
            'user_id' => 'required',
            'password' => 'required'
        ]);

        if(\Auth::attempt($request->only('user_id','password'))){
            return redirect('home');
        }
        return redirect('login')->withError('Login details is not valid!');
    }

    public function register_view(){
        return view('auth.register');
    }

    public function register(Request $request){
        //dd($request->all());
        $request->validate([
            'user_nm' => 'required|string|max:255',
            'user_id' => 'required|string|unique:users,user_id|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        //save data
        User::create([
            'name' => $request->user_nm,
            'user_id' => $request->user_id,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        if(\Auth::attempt($request->only('user_id','password'))){
            return redirect('home');
        }
        return redirect('register')->withError('Validation error!');
    }

    public function home(){
        return view('home');
    }

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('');
    }
}
