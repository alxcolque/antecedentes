<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\RecordsImport;
use App\Models\Action;
use Illuminate\Http\Request;
use App\Models\Record;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Antecedent;
use App\Models\Province;
use App\Models\Department;
use App\Models\Detective;
use App\Models\Crime;
use App\Models\DetailAnt;
use App\Models\Import;
use App\Models\Person;
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
            //$antecedent -> import_id = $this-> getImpotID(auth()->user()->id);
            $antecedent->save();
            $person = new Person();
            $person -> arrestado = $record->arrestado;
            $person -> ci = $record->ci;
            $person -> nacido = $record->nacido;
            $person -> nacionalidad = $record->nacionalidad;
            $person -> edad = $record->edad;
            $person -> genero = $record->genero;
            $person ->save();
            $detailant = new DetailAnt();
            $detailant -> antecedent_id = Antecedent::max('id');
            $detailant -> person_id = Person::max('id');
            $detailant -> save();
        }
        Record::truncate();
        //tabla import
        $import = new Import(); 
        $date = new DateTime();
        $import->fechaimport = $date->format('Y-m-d H:i:s');
        $import->user_id = auth()->user()->id; 
        $import->save();
        //acciones del usuario
        $import = new Action(); 
        $date = new DateTime();
        $import->usuario = auth()->user()->nombreusuario; 
        $import->accion = "Importacion de un archivo"; 
        $import->fecha = $date->format('Y-m-d H:i:s');
        $import->save();


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
