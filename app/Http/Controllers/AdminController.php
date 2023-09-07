<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.adminUser', [
            'users' => User::all('*')->where('is_admin', 0)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|max:255|email:dns|unique:users',
            'password' => 'required|max:255',
            'is_admin' => 'required',
        ]);
        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/dashboard/admin')->with('success', 'New User Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        return view('dashboard.admin.detailUser', [
            'user' => $id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        return view('dashboard.admin.updateUser', [
            'user' => $id
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
            'email' => ['required', 'email:dns'],
            'is_admin' => ['max:255']
        ]);

        if(Hash::needsRehash($request->password)) {
            $dataUser['password'] = Hash::make($request->password);
        };

        User::where('id', $request->id)->update($dataUser);

        return redirect()->intended('/dashboard/admin')->with('update', 'Successfully updated');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $idUser = User::where('id', $id);
        $idUser->delete();
        
        return back()->with('delete', 'Successfully delete user');
    }
}
