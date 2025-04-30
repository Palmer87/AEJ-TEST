<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthControlle extends Controller
{
  public function showSignUp(){
    if(Auth::check()){
      return redirect()->route('dashbord');
    }
      return view('auth.signup');
  }
  public function showforlogin(){
    if(Auth::check()){
      return redirect()->route('dashbord');
    }
      return view('auth.login');
  }
  public function login(Request $request){
    $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:8|string',
    ]);
    if(Auth::attempt($request->only('email','password'))){
      return redirect()->route('dashbord');
    }else{
      return back()->withErrors(['email'=>'email ou mote de passe incorrect']);
    }
  }
  public function signUp(Request $request){
    $request->validate([
      'name' =>'required|min:3|string',
      'email' =>'required|email|unique:users',
      'password' =>'required|min:8|string',
    ]);
    $user = new \App\Models\User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return back()->with('success','votre compte a ete cree avec success');
  }
  public function logout(){
    Auth::logout();
    return redirect()->route('login');
  }
 


}
