<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Antecedent;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\Department;
use Exception;

class AntecedenteController extends Controller
{
    public function index()
    {
        return view('admin.antecedentes.index');
    }

    public function import(){
        
        $path = public_path('prueba1.csv');
        $lines = file($path);
        $utf8_lines = array_map('utf8_encode',$lines);
        
        //return array_map('str_getcsv',$utf8_lines);
        $array = array_map('str_getcsv',$utf8_lines);
        for($i=0;$i<sizeof($array);++$i){
            $antecedent = new Antecedent();
            $antecedent -> fechahecho = $array[$i][3];
            $antecedent -> hora = $array[$i][4];
            $antecedent -> mesregistro = $array[$i][5];
            $antecedent -> localidad = $array[$i][9];
            $antecedent -> zonabarrio = $array[$i][10];
            $antecedent -> lugarhecho = $array[$i][11];
            $antecedent -> gps = $array[$i][12];
            $antecedent -> unidad = $array[$i][13];         
            $antecedent -> temperancia = $array[$i][20];
            $antecedent -> causaarresto = $array[$i][21];
            $antecedent -> nathecho = $array[$i][22];
            $antecedent -> arma = $array[$i][23];
            $antecedent -> remitidoa = $array[$i][24];
            $antecedent -> pertenencias = $array[$i][26];
            
            $antecedent -> municipality_id = $this-> getDetectiveID(
                $array[$i][6],$array[$i][7]);

            $antecedent -> detective_id = $this-> getProvinceID(
                $array[$i][6],$array[$i][7]);

            $antecedent -> crime_id = $this-> getProvinceID(
                $array[$i][6],$array[$i][7]);


            $antecedent->save();
        }
    }
    public function getDetectiveID($degreeName, $detectiveName){
        $detective = Detective::where('nombres',$detectiveName)->first();
        if($detective){
            return $detective->id;
        }
        $detective = new Detective();
        $detective -> provincia = $detectiveName;
        $degree = degree::firstOrCreate([
            'grado'=>$degreeName
        ]);
        $detective->degree_id = $degree->id;
        $detective->save();
        return $detective->id;
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
