<?php

namespace App\Http\Controllers;

use App\Models\Antecedent;
use Illuminate\Http\Request;
use Illuminate\Http\Middleware\SoloAdmin;
use Yajra\DataTables\Datatables;


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
        //$antecedents = Antecedent::all();
        //$this->tableantecedentes();
        return view('home');
    }
    public function tbtljsonantecedentes()
    {
        return datatables()->of(Antecedent::all())->toJson();
    }
}
