<?php

namespace App\Http\Controllers;

use App\Models\Advice;
use App\Models\Carrusel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $carruseles = Carrusel::orderBy('id', 'desc')->get();
        $advices = Advice::orderBy('id', 'desc')->get();
        return view('welcome',compact('advices','carruseles'));
    }
}
