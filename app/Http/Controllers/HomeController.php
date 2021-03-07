<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\SoloAdmin;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=> ['index']]);

    }

    public function index()
    {
        return view('home');
    }
}
