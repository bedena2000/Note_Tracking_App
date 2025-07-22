<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Purifier;

class NoteController extends Controller
{
    public function store(Request $request, $folderName)
    {
        $validated = $request->validate([
            "note_content" => "required",
            "note_name" => "required",
        ]);

        $folder = auth()
            ->user()
            ->folders()
            ->where("name", $folderName)
            ->firstOrFail();

        Note::create([
            "title" => $request->note_name,
            "context" => \Mews\Purifier\Facades\Purifier::clean($request->note_content), // <- secure this
            "is_favourite" => false,
            "is_trash" => false,
            "is_archived" => false,
            "folder_id" => $folder->id,
        ]);

        return back();
    }


    public function update(Request $request)
    {
        $action = $request->input("action");
        $updatedHTMLContent = Purifier::clean($request->_html_hidden_content);
        $noteId = (int) $request->note_editor_modal_note_id_name;
        $folderId = (int) $request->note_editor_modal_note_folder_id_name;

        $note = Note::findOrFail($noteId);

        if ($note->folder_id !== $folderId) {
            return redirect()->back()->with("error", "Folder Mismatch");
        }

        if ($action === "favourite") {
            $note->is_favourite = true;
            $note->save();
            return redirect()
                ->back()
                ->with("status", "note has been added to favourite");
        }

        if ($action === "archive") {
            $note->is_archived = true;
            $note->save();
            return redirect()->back()->with("status", "note has been archived");
        }

        if ($action === "delete") {
            $note->is_trash = true;
            $note->save();
            return redirect()->back()->with("status", "note deleted");
        }

        if ($action === "update") {
            $note->context = $updatedHTMLContent;

            $note->save();
            return redirect()->back()->with("status", "note saved");
        }

        return redirect()->back();
    }

    public function favourites()
    {
        $notes = Note::where("is_favourite", true)->orderBy("title")->get();

        return view("pages.favourite", ["notes" => $notes]);
    }

    public function favourite_remove(Request $request)
    {

        $noteId = (int) $request->note_item_id;
       
        $note = Note::findOrFail($noteId);

        $note->is_favourite = false;
        $note->save();

        return redirect()->back();
    }

    public function archive()
    {
        $notes = Note::where("is_archived", true)->orderBy("title")->get();
        return view("pages.archive", ["notes" => $notes]);
    }

    public function remove_from_archive(Request $request) {
        $noteId = (int) $request->note_item_id;
       
        $note = Note::findOrFail($noteId);

        $note->is_archived = false;
        $note->save();

        return redirect()->back();
    }

    public function trash()
    {
        $notes = Note::where("is_trash", true)->orderBy("title")->get();
        return view("pages.trash", ["notes" => $notes]);
    }

    public function delete_note(Request $request) {
        $noteId = (int) $request->note_item_id;
       
        $note = Note::findOrFail($noteId);

        $note->delete();

        return redirect()->back();
    }
}
