<?php

use Illuminate\Support\Facades\Route;


// Registration and authentication
Route::get("/login", function () {
    return view('login.login');
});

Route::get("/register", function () {
    return "register page";
});


Route::get("/", function () {
    return "Main Page";
})->name("home");

Route::get("/{folderName}", function () {
    return "Folder Name";
})->where(["folderName", "[A-Za-z]+"])->name("folder");

Route::get("/{folderName}/{noteId}", function () {
    return "Folder Name plus note Id";
})->name("note");

// Error Page

Route::fallback(function () {
    return "error page";
});


// Post
