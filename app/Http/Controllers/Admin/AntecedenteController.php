<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AntecedenteController extends Controller
{
    public function index()
    {
        return view('admin.antecedentes.index');
    }

    function import(Request $request){
        /*$this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('select_file')->getRealPath();*/
        $path = public_path('prueba.csv');
        //$content = utf8_encode(file_get_contents($path));
        $lines = file($path);
        $utf8_lines = array_map('utf8_encode',$lines);
        return array_map('str_getcsv',$utf8_lines);
    }
    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id) //show(Antecente $id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
