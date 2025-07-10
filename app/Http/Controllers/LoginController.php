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

      $remember_on = $request->rememberme == "on" ? true : false;


      if(Auth::attempt(['name' => $request->username, 'password' => $request->password], $remember_on)) {
        $request->session()->regenerate();

        return redirect()->intended('/');
      }

      return back()->withErrors(['login_error' => 'Username or password are not correct']);
    }

    public function logout(Request $request) {
      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('/');
    }
}
