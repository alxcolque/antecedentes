<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $advices = Advice::orderBy('id', 'desc')->get();
        return view('welcome',compact('advices'));
    }
}
