<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FolderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\HomeController;

// Registration and authentication
Route::get("/login", [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post("/login", [LoginController::class, 'login']);


Route::get("/register", [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post("/register", [RegisterController::class, 'register']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get("/", [HomeController::class, 'index'])->name("home")->middleware('auth');

Route::get("/{folderName}", function () {
    return "Folder Name";
})->where(["folderName", "[A-Za-z]+"])->name("folder")->middleware('auth');

Route::post("/folder_create", [FolderController::class, 'store'])->name('folder_create');

Route::get("/{folderName}/{noteId}", function () {
    return "Folder Name plus note Id";
})->name("note")->middleware('auth');

// Error Page

Route::fallback(function () {
    return "error page";
});


// Post
