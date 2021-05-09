<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(auth()->user()->rol == "1"){
            return view('changePassword');
        }else if (auth()->user()->rol == "2"){
            return view('moders.changePassword');
        }else{
            return view('consultor.changePassword');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return back()->with('info', 'Su contraseña se ha cambiado con éxito');
    }
}
