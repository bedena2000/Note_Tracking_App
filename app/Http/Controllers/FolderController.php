<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    public function index(Request $request) { 

        $currentFolderName = urldecode($request->path());

        $folder = auth()->user()->folders()->where('name', $currentFolderName)->with('notes')->firstOrFail();

        $notes = $folder->notes;

        return view('pages.folder', ['notes' => $notes]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'folder_name' => 'required'
        ]);

        auth()->user()->folders()->create([
            'name' => $request->folder_name
        ]);

        return redirect()->route('folder', ['folderName' => $request->folder_name]);
    }
}
