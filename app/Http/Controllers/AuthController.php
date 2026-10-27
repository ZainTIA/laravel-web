<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

class AuthController extends Controller
{
    //show the login page
    function showLogin()
    {
        return view('CV.Admin_Pages.login');
    }

    //handel the form submission
    function login(Request $req)
    {
        $info = $req->validate([
            "email" => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to log in
        if (Auth::attempt($info)) {
            //success! create a secure session and redirect to dashboard
            $req->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        //if it fail send them back with an error
        return back()->withErrors(["email" => "provided indo do not match our recored. "]);
    }

    //show the dashboard
    public function dashboard()
    {
        return view('CV.Admin_Pages.dashboard');
    }

    //handel logout
    function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }
}
