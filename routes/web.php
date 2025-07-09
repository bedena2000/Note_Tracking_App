<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


// Registration and authentication
Route::get("/login", [LoginController::class, 'index'])->name('login');
Route::post("/login", [LoginController::class, 'login']);


Route::get("/register", [RegisterController::class, 'index'])->name('register');
Route::post("/register", [RegisterController::class, 'register']);

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
