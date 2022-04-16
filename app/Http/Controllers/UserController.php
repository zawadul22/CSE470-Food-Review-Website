<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/review');
        }
        return redirect("/")->withSuccess('Login details are not valid');
    }

     public function ownerLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/myRestaurantReview');
        }
        return redirect("/")->withSuccess('Login details are not valid');
    }

    public function ownerLoginView(){
        return view ('ownerLogin');
    }


    public function registerIndex(){
        return view ('register');
    }

     public function ownerRegisterView(){
        return view ('ownerRegister');
    }

    public function register(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('message', 'You have registered. Please go to login page!');

    }

    public function ownerRegister(Request $request){
        //dd($request->restaurant_name);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'restaurant_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'restaurant_name' => $request->restaurant_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('message', 'You have registered. Please go to login page!');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

    public function ownerSignOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/ownerLogin');
    }
}
