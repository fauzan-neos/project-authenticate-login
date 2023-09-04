<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            "title" => "Register",
            "active" => "register"
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        // memakai bcrypt untuk mengacak password
        // $validatedData['password'] = bcrypt($validatedData['password']);

        // memakai hash untuk mengacak password
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // memakai flash untuk memunculkan alert message
        // $request->session()->flash('success', 'Registration Success! Please Login');

        // memakai with dengan cara kerja yang sama seperti menggunakan flash
        return redirect('/login')->with('success', 'Registration Success! Please Login');
    }
}
