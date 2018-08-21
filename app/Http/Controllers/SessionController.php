<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class SessionController extends Controller
{
    /**
     * @var MessageBag
     * The errors that will be send to the view
     */
    private $errors;

    public function __construct()
    {
        $this->errors = new MessageBag();
    }

    public function login(Request $request) 
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('/');
        }
        $this->errors->add("login", "Invalid email/password");
        return redirect('/')->withErrors($this->errors);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
