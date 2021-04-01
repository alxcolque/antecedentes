<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\RecordsImport;
use Illuminate\Http\Request;
use App\Models\Record;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\Antecedent;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\Department;
use App\Models\Detective;
use App\Models\Crime;
use App\Models\Import;
use Exception;
use DateTime;

class AntecedenteController extends Controller
{
    public function index()
    {   $records = Record::latest()->paginate(50);
        return view('admin.antecedentes.index',compact('records'))
        ->with('i', (request()->input('página', 1) - 1) * 5);
    }
    public function importExcel(Request $request) 
    {
        Excel::import(new RecordsImport,$request->import_file);

        $request->session()->put('success', 'Your file is imported successfully in database.');
           
        return redirect('antecedentes/import');//->with('status', 'Archivo procesado correctamente');
    }
    public function registrarimport()
    {   $records = Record::get();
        foreach ($records as $record){//echo $antecedent."\n";
            $antecedent = new Antecedent();
            $antecedent -> fechahecho = $record->fechahecho;
            $antecedent -> hora = $record->hora;
            $antecedent -> mesregistro = $record->mesregistro;
            $antecedent -> municipio = $record->municipio;
            $antecedent -> localidad = $record->localidad;
            $antecedent -> zonabarrio = $record->zonabarrio;
            $antecedent -> lugarhecho = $record->lugarhecho;
            $antecedent -> gps = $record->gps;
            $antecedent -> unidad = $record->unidad;         
            $antecedent -> temperancia = $record->temperancia;
            //$antecedent -> causaarresto = $record->;
            $antecedent -> nathecho = $record->nathecho;
            $antecedent -> arma = $record->arma;
            $antecedent -> remitidoa = $record->remitidoa;
            $antecedent -> pertenencias = $record->pertenencias;
            
            $antecedent -> province_id = $this-> getProvinceID($record->departamento,$record->provincia);

            $antecedent -> detective_id = $this-> getDetectiveID($record->nombres);

            $antecedent -> crime_id = $this-> getCrimeID($record->causaarresto);

            $antecedent -> import_id = $this-> getImpotID(auth()->user()->id);

            $antecedent->save();
        }
        //Record::truncate();
        return "Correcto la insercion";
    }
    public function import(){
        $records = Record::latest()->paginate(50);
        return view('admin.antecedentes.import_file',compact('records'))
        ->with('i', (request()->input('página', 1) - 1) * 5);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        //return Excel::download(new UsersExport, 'users.'.$slug);
    }
    
    function import5(Request $request)
    {
        
        //$array = json_decode($request, true);
        //$data = $request->json()->all();
        /*$data = json_decode($request->getContent(), true);
        $array = json_encode($data);*/
        return auth()->user()->id;

        //$fechahecho = $data[0][0];
        /*foreach($data as $array_data) {
            
            $fechahecho = $array_data['0'];
            $hora = $array_data['1'];
            $mesregistro = $array_data['2'];
            $departamento = $array_data['3'];
            $provincia = $array_data['4'];
            $municipio = $array_data['5'];
            $localidad = $array_data['6'];
            $zonabarrio = $array_data['7'];
            $lugarhecho = $array_data['8'];
            $gps = $array_data['9'];
            $unidad = $array_data['10'];
            $arrestado = $array_data['11'];
            $ci = $array_data['12'];
            $nacido = $array_data['13'];
            $nacionalidad = $array_data['14'];
            $edad = $array_data['15'];
            $genero = $array_data['16'];
            $temperancia = $array_data['17'];
            $causaarresto = $array_data['18'];
            $nathecho = $array_data['19'];
            $arma = $array_data['20'];
            $remitidoa = $array_data['21'];
            $nombres = $array_data['22'];
            $pertenencias = $array_data['23'];
            //echo "Hola como estas todo bien";
            /*horarioModel::updateOrCreate(
                ['id_horario' => $dato1?: NULL],
                [
                    'clase' => $dato2,
                    'fecha' => $dato3,
                    'hora' => $dato4,
                    'tipo' => $dato5,
                    'minutos_bloque' => $dato6,
                    'id_profesor' => $dato7,
                    'id_vehiculo' => $dato8
                ]
            );*/
        //}
        //echo json_encode($data[0]);
        
        
    }
 

    public function import56(){
        
        //$file_n = public_path();
        $file = fopen('datos.csv', "r");
        $i=1;

        while (($array_data = fgetcsv($file, 10000, ";")) !== false) {
            $i++;
            $antecedent = new Antecedent();
            //$antecedent  = $array[1];
            //echo $antecedent."\n";
            $antecedent -> fechahecho = $array_data[1];
            $antecedent -> hora = $array_data[2];
            $antecedent -> mesregistro = $array_data[3];
            $antecedent -> municipio = $array_data[7];
            $antecedent -> localidad = $array_data[7];
            $antecedent -> zonabarrio = $array_data[8];
            $antecedent -> lugarhecho = $array_data[9];
            $antecedent -> gps = $array_data[10];
            $antecedent -> unidad = $array_data[11];         
            $antecedent -> temperancia = $array_data[18];
            //$antecedent -> causaarresto = $array_data[19];
            $antecedent -> nathecho = $array_data[20];
            $antecedent -> arma = $array_data[21];
            $antecedent -> remitidoa = $array_data[22];
            $antecedent -> pertenencias = $array_data[24];
            
            $antecedent -> province_id = $this-> getProvinceID(
                $array_data[6],$array_data[5],$array_data[4]);

            $antecedent -> detective_id = $this-> getDetectiveID(
                $array_data[23]);

            $antecedent -> crime_id = $this-> getCrimeID(
                $array_data[19]);

            $antecedent -> import_id = $this-> getImpotID(auth()->user()->id);

            $antecedent->save();
         }
         fclose($file);


        /*$path = public_path('datos.csv');
        $lines = file($path);
        $utf8_lines = array_map('utf8_encode',$lines);
        
        //return array_map('str_getcsv',$utf8_lines);
        $array = array_map('str_getcsv',$utf8_lines);
        for($i=1;$i<sizeof($array);++$i){*/
        //$archivotmp = $_FILES['archivo']['tmp_name'];

        
        //Recorremos las columnas de esa linea
        
            /*$antecedent = new Antecedent();
            $antecedent -> fechahecho = $array[$i][1];
            $antecedent -> hora = $array[$i][2];
            $antecedent -> mesregistro = $array[$i][3];
            $antecedent -> localidad = $array[$i][7];
            $antecedent -> zonabarrio = $array[$i][8];
            $antecedent -> lugarhecho = $array[$i][9];
            $antecedent -> gps = $array[$i][10];
            $antecedent -> unidad = $array[$i][11];         
            $antecedent -> temperancia = $array[$i][18];
            //$antecedent -> causaarresto = $array[$i][19];
            $antecedent -> nathecho = $array[$i][20];
            $antecedent -> arma = $array[$i][21];
            $antecedent -> remitidoa = $array[$i][22];
            $antecedent -> pertenencias = $array[$i][24];
            
            $antecedent -> municipality_id = $this-> getMunicipalityID(
                $array[$i][6],$array[$i][5],$array[$i][4]);

            $antecedent -> detective_id = $this-> getDetectiveID(
                $array[$i][23]);

            $antecedent -> crime_id = $this-> getCrimeID(
                $array[$i][19]);

            $antecedent -> import_id = $this-> getImpotID(auth()->user()->id);

            $antecedent->save();
            */
            

    }
    public function getMunicipalityID($departmentName, $provinceName, $municipalityName){
        //Insertar municipio
        $municipality = Municipality::where('municipio',$municipalityName)->first();
        if($municipality){
            return $municipality->id;
        }
        $municipality = new Province();
        $municipality -> municipio = $municipalityName;
        return $this->getProvinceID($departmentName, $provinceName);
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
    public function getDetectiveID($detectiveName){
        
        $detective = Detective::firstOrCreate([
            'nombres'=>$detectiveName
        ]);
        $detective->save();
        return $detective->id;
    }
    public function getCrimeID($crimeName){
        
        $crime = Crime::firstOrCreate([
            'causaarresto'=>$crimeName
        ]);
        $crime->save();
        return $crime->id;
    }
    public function getImpotID($idUser){
        $import = new Import(); 
        $date = new DateTime();
        $import->fechaimport = $date->format('Y-m-d H:i:s');
        $import->user_id = $idUser; 
        $import->save();
        return $import->id;
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
