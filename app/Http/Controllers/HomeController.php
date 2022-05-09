<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaction;

class HomeController extends Controller
{
    public function dashboard(){
        return view('home.dashboard');
    }

    public function fund(){
        return view('home.fund'); 
    }

    public function admin(){
        return view('home.admin')->with([
            'users'=>User::all()
        ]);
    }

    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }


    public function authenticate(Request $request){

		$this->validate($request, [
			'email'=>'required',
			'password'=>'required',
		]);
		
		$credentials=$request->only('email','password');
		if(Auth::attempt($credentials)){

			$request->session()->regenerate();			
			if( auth()->user()->role=='user' ){

				return redirect()->route('dashboard');

			}else{
				return redirect()->route('admin');
			}
			
		}
        
		$request->flashExcept('password');
		return back()->withErrors([
			'error'=>'Invalid Credentials',
		]);
	}

    public function logout(){
        Auth::logout();
        return view('login');
    }
}
