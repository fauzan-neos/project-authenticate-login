<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;
use App\Models\User;

class NotesAdminController extends Controller
{
    public function index() {
        // $title = 'All Notes';
        // if(request('author')) {
        //     $notes = Notes::firstWhere('author', request('author'));
        //     $title = 'Notes By ' . $notes->author;
        // }

        return view('dashboard.notes.admin.notesAdmin', [
            // 'title' => $title,
            'notes' => Notes::latest()->paginate(10)->withQueryString()
            // 'notes' => Notes::latest()->filter(request(['search','author']))->paginate(6)->withQueryString()

        ]);
    }

    public function show($author) {
        $notes = Notes::latest()->where('author', $author)->get();
        dd($notes[0], $notes[0]->user);
        return view('dashboard.notes.admin.showNotesByUser', [
        ]);
    }
}
