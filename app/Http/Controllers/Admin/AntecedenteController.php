<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        /*$this->validate($request,[
            'select_file' => 'required|mimes:xls,xlsx'
        ]);
        $path = $request->file('select_file')->getRealPath();*/
        $path = public_path('prueba1.csv');
        //$content = utf8_encode(file_get_contents($path));
        $lines = file($path);
        $utf8_lines = array_map('utf8_encode',$lines);
        /*$array = array_map(function($v){
            return str_getcsv($v, "|");
        },$utf8_lines);*/
        //return array_map('str_getcsv',$utf8_lines);
        $array = array_map('str_getcsv',$utf8_lines);
        for($i=0;$i<sizeof($array);++$i){
            $municipality = new Municipality();
            $municipality -> municipio = $array[$i][8];
            $municipality -> province_id = $this-> getProvinceID(
                $array[$i][6],$array[$i][7]) ;
            $municipality->save();
        }
    }
    public function getProvinceID($departmentName, $provinceName){
        $province = Province::where('provincia',$provinceName)->first();
        if($province){
            return $province->id;
        }
        $province = new Province();
        $province -> provincia = $provinceName;
        $department = Department::firstOrCreate([
            'departamento'=>$departmentName
        ]);
        $province->department_id = $department->id;
        $province->save();
        return $province->id;
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
