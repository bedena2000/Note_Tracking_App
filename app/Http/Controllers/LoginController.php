<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(): View {
      return view('login.login');
    }

    public function login(Request $request) {

      $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required']
      ]);

      if(Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
        $request->session()->regenerate();

        return redirect()->intended('/');
      }

      return back()->withErrors(['login_error' => 'Username or password are not correct']);
    }
}
