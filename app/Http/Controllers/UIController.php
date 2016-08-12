<?php

namespace App\Http\Controllers;

class UIController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('providers.index');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register()
    {
        //
    }
}
