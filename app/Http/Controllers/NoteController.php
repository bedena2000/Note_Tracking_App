<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function store(Request $request, $folderName) {
        $validated = $request->validate([
            'note_content' => 'required',
            'note_name' => 'required'
        ]);

        $folder = auth()->user()->folders()->where('name', $folderName)->firstOrFail();

        Note::create([
            'title' => $request->note_name,
            'context' => $request->note_content,
            'is_favourite' => false,
            'is_trash' => false,
            'is_archived' => false,
            'folder_id' => $folder->id
        ]);


        return back();
    }
}
