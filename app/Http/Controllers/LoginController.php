<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class LoginController extends Controller
{
    public function index() {
        return view('login.index', [
            "title" => "Login",
            "active" => "login"
        ]);
    }

    public function authenticate(Request $request)
    {
        // Get username and email for login
        $email_username = $request->email_username;
        $user = User::where('email', $email_username)->first();
        if(!$user){
            $user = User::where('username', $email_username)->first();
        }

        
        if(!$user) return back()->with('loginError', 'Login Failed!');
        
        $isValidUser = Hash::check($request->password, $user->password);
        if(!$isValidUser) return back()->with('loginError', 'Login Failed!');
        
        if(Auth::loginUsingId($user->id)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/dashboard');
        }
        // $credentials = $request->validate([
        //     'email' => ['required', 'email:dns'],
        //     'password' => ['required'],
        // ]); 
 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('/dashboard');
        // }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
