<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.user' , [
            "users" => User::all('*')->where('id', auth()->user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('dashboard.user.detail', [
            'users' => User::all('*')->where('id', auth()->user()->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('dashboard.user.edit', [
            "users" => User::all('*')->where('id', auth()->user()->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dataUser = $request->validate([
            'id' => ['required'],
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email:dns']
        ]);

        if(Hash::needsRehash($request->password)) {
            $dataUser['password'] = Hash::make($request->password);
        };

        User::where('id', $request->id)->update($dataUser); 

        return redirect()->intended('/dashboard/user')->with('update', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
