<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use App\Models\User;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.notes.user.notes', [
            'notes' => Notes::all()->where('author', auth()->user()->username)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.notes.user.addNotes', [
            'users' => User::all()->where('id', auth()->user()->id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $validateData = $request->validate([
            'author' => 'required',
            'title' => 'required|max:150',
            'notes' => 'required|max:10000'
        ]);
        
        $validateData['author_id'] = auth()->user()->id;

        Notes::create($validateData);

        return redirect('/dashboard/user/notes')->with('add', 'New Note Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($notes)
    {
        return view('dashboard.notes.user.updateNotes', [
            'notes' => Notes::all()->where('notes', $notes)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $notes)
    {
        $validateData = $request->validate([
            'author' => 'required',
            'title' => 'required|max:150',
            'notes' => 'required|max:10000'
        ]);

        Notes::where('notes', $notes)->update($validateData);

        return redirect('/dashboard/user/notes')->with('update', 'Note Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataNotes = Notes::where('id', $id);
        $dataNotes->delete();

        return back()->with('delete', 'Note Deleted');
    }
}
