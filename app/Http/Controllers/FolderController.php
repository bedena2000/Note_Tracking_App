<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;

class FolderController extends Controller
{
    public function store(Request $request) {

        $validated = $request->validate([
            'folder_name' => 'required'
        ]);

        auth()->user()->folders()->create([
            'name' => $request->folder_name
        ]);

        return redirect()->route('home');
    }
}
