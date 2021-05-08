<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AntecedentExport;
use App\Http\Controllers\Controller;
use App\Imports\RecordsImport;
use App\Models\Action;
use Illuminate\Http\Request;
use App\Models\Record;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Antecedent;
use App\Models\AntecedentPerson;
use App\Models\Province;
use App\Models\Department;
use App\Models\Detective;
use App\Models\Crime;
use App\Models\Import;
use App\Models\Person;
use Exception;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use PhpParser\Node\Expr\New_;

class AntecedenteController extends Controller
{
    public function index(Request $request)
    {

        //$antecedents = Antecedent::with('people', 'detective', 'crime', 'province')->limit(8)->get();;
        $cant_ant = Antecedent::count();
        $date = new DateTime();
        $hoy = $date->format('Y');
        //echo $hoy;
        if (request()->ajax()) {
            return datatables()->of(DB::table('antecedents')
                ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
                ->join('people', 'antecedent_person.person_id', '=', 'people.id')
                ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
                ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
                ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
                ->join('departments', 'provinces.department_id', '=', 'departments.id')
                ->where('gestion', [$hoy])
                ->get(array(
                    'antecedents.id',
                    'arrestado',
                    'ci',
                    'nacido',
                    'nacionalidad',
                    'edad',
                    'genero',
                    'gestion',
                    'fechahecho',
                    'hora',
                    'mesregistro',
                    'departamento',
                    'provincia',
                    'municipio',
                    'localidad',
                    'zonabarrio',
                    'lugarhecho',
                    'temperancia',
                    'gps',
                    'causaarresto',
                    'nathecho',
                    'unidad',
                    'arma',
                    'remitidoa',
                    'pertenencias',
                    'nombres',
                )))
                ->addColumn('detalle', 'admin.antecedentes.btn-detalle')
                ->rawColumns(['detalle'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.antecedentes.index', compact('cant_ant'));
    }
    public function filterbydate(Request $request)
    {
        //$this->filtroAntecedente('12/01/2020', '12/30/2020');
        $date1 = $request->date1;
        $date2 = $request->date2;
        if (request()->ajax()) {
            return datatables()->of(DB::table('antecedents')
                ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
                ->join('people', 'antecedent_person.person_id', '=', 'people.id')
                ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
                ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
                ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
                ->join('departments', 'provinces.department_id', '=', 'departments.id')
                ->whereBetween('fechahecho', [$date1, $date2])
                ->get(array(
                    'antecedents.id',
                    'arrestado',
                    'ci',
                    'nacido',
                    'nacionalidad',
                    'edad',
                    'genero',
                    'gestion',
                    'fechahecho',
                    'hora',
                    'mesregistro',
                    'departamento',
                    'provincia',
                    'municipio',
                    'localidad',
                    'zonabarrio',
                    'lugarhecho',
                    'temperancia',
                    'gps',
                    'causaarresto',
                    'nathecho',
                    'unidad',
                    'arma',
                    'remitidoa',
                    'pertenencias',
                    'nombres',
                )))
                ->addColumn('detalle', 'admin.antecedentes.btn-detalle')
                ->rawColumns(['detalle'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function filterbyYear(Request $request)
    {

        $year = $request->id;

        //return response()->json($data);

        if (request()->ajax()) {

            return datatables()->of(DB::table('antecedents')
                ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
                ->join('people', 'antecedent_person.person_id', '=', 'people.id')
                ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
                ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
                ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
                ->join('departments', 'provinces.id', '=', 'departments.id')
                ->where('gestion', [$year])
                ->get(array(
                    'antecedents.id',
                    'arrestado',
                    'ci',
                    'nacido',
                    'nacionalidad',
                    'edad',
                    'genero',
                    'gestion',
                    'fechahecho',
                    'hora',
                    'mesregistro',
                    'departamento',
                    'provincia',
                    'municipio',
                    'localidad',
                    'zonabarrio',
                    'lugarhecho',
                    'temperancia',
                    'gps',
                    'causaarresto',
                    'nathecho',
                    'unidad',
                    'arma',
                    'remitidoa',
                    'pertenencias',
                    'nombres',
                )))
                ->addColumn('detalle', 'admin.antecedentes.btn-detalle')
                ->rawColumns(['detalle'])
                ->addIndexColumn()
                ->make(true);
        }
        //return view('admin.antecedentes.index');


    }
    public function filterall(Request $request)
    {

        if (request()->ajax()) {
            return datatables()->of(DB::table('antecedents')
                ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
                ->join('people', 'antecedent_person.person_id', '=', 'people.id')
                //->join('antecedent_person', 'antecedent_person.person_id', '=', 'antecedent_person.antecedent_id')
                ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
                ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
                ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
                ->join('departments', 'provinces.department_id', '=', 'departments.id')

                ->get(array(
                    'antecedents.id',
                    'arrestado',
                    'ci',
                    'nacido',
                    'nacionalidad',
                    'edad',
                    'genero',
                    'gestion',
                    'fechahecho',
                    'hora',
                    'mesregistro',
                    'departamento',
                    'provincia',
                    'municipio',
                    'localidad',
                    'zonabarrio',
                    'lugarhecho',
                    'temperancia',
                    'gps',
                    'causaarresto',
                    'nathecho',
                    'unidad',
                    'arma',
                    'remitidoa',
                    'pertenencias',
                    'nombres',
                )))
                ->addColumn('detalle', 'admin.antecedentes.btn-detalle')
                ->rawColumns(['detalle'])
                ->addIndexColumn()
                ->make(true);
        }
        //return view('admin.antecedentes.index');


    }
    public function filterultimateimport(Request $request)
    {
        //echo $request['gestion'];
        $import = Import::max('id');
        if (request()->ajax()) {
            return datatables()->of(DB::table('antecedents')
                ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
                ->join('people', 'antecedent_person.person_id', '=', 'people.id')
                ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
                ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
                ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
                ->join('departments', 'provinces.department_id', '=', 'departments.id')
                ->where('import_id', $import)
                ->get(array(
                    'antecedents.id',
                    'arrestado',
                    'ci',
                    'nacido',
                    'nacionalidad',
                    'edad',
                    'genero',
                    'gestion',
                    'fechahecho',
                    'hora',
                    'mesregistro',
                    'departamento',
                    'provincia',
                    'municipio',
                    'localidad',
                    'zonabarrio',
                    'lugarhecho',
                    'temperancia',
                    'gps',
                    'causaarresto',
                    'nathecho',
                    'unidad',
                    'arma',
                    'remitidoa',
                    'pertenencias',
                    'nombres',
                )))
                ->addColumn('detalle', 'admin.antecedentes.btn-detalle')
                ->rawColumns(['detalle'])
                ->addIndexColumn()
                ->make(true);
        }
        //return view('admin.antecedentes.index');


    }

    public function importExcel(Request $request)
    {
        Excel::import(new RecordsImport, $request->import_file);

        return redirect('admin/import')->with('info', 'el archivo seleccionado se ha cargado con exito, Verifique que los datos estén correctos');
    }
    public function tiempo($doubl)
    {
        $secondsInDay = 86400;
        # Time as a float must greater or equal to zero and less or equal to one.
        $dayAsFloat = $doubl;
        # Determine the number of seconds
        $totalSeconds = intval($secondsInDay * $dayAsFloat);
        # Calculate number of seconds
        $seconds = $totalSeconds % 60;
        $totalSeconds = $totalSeconds / 60;
        # Calculate number of minutes
        $minutes = $totalSeconds % 60;
        $totalSeconds = $totalSeconds / 60;
        # Calculate number of hours
        $hours = $totalSeconds % 60;
        $timeString = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
        return $timeString;
    }
    //Pasar a la base de datos
    public function registrarimport()
    {
        try {
            $count = Import::count('id');
            if ($count === 0) {
                $import_id = 2;
                $records = DB::table('records')->where('tiporegistro', "1")->get();
                $min = DB::table('records')->where('tiporegistro',"1")->get(array(
                    'gestion'));
                if(is_integer($min[0]->gestion)) {
                    return redirect('/admin/import')->with('error', 'Revise los datos antes de importar, no son correctos');
                }
                //tabla import
                $import = new Import();
                $date = new DateTime();
                $import->id = $import_id;
                $import->fechaimport = $date->format('Y-m-d H:i:s');
                $import->user_id = auth()->user()->id;
                $import->save();
            } else {
                $records = DB::table('records')->where('tiporegistro', "1")->get();
                $min = DB::table('records')->where('tiporegistro',"1")->get(array(
                    'gestion'));
                if(is_integer($min[0]->gestion)) {
                    return redirect('/admin/import')->with('error', 'Revise los datos antes de importar, Estos no son correctos');
                }
                //tabla import
                $import = new Import();
                $date = new DateTime();
                $import->fechaimport = $date->format('Y-m-d H:i:s');
                $import->user_id = auth()->user()->id;
                $import->save();
            }
            foreach ($records as $record) { //echo $antecedent."\n";
                $antecedent = new Antecedent();
                $antecedent->gestion = $record->gestion;
                $antecedent->fechahecho = jdtogregorian(($record->fechahecho) + 2415019);
                $antecedent->hora = $this->tiempo($record->hora);
                $antecedent->mesregistro = $record->mesregistro;
                $antecedent->municipio = $record->municipio;
                $antecedent->localidad = $record->localidad;
                $antecedent->zonabarrio = $record->zonabarrio;
                $antecedent->lugarhecho = $record->lugarhecho;
                $antecedent->gps = $record->gps;
                $antecedent->unidad = $record->unidad;
                $antecedent->temperancia = $record->temperancia;
                //$antecedent -> causaarresto = $record->;
                $antecedent->nathecho = $record->nathecho;
                $antecedent->arma = $record->arma;
                $antecedent->remitidoa = $record->remitidoa;
                $antecedent->pertenencias = $record->pertenencias;
                $antecedent->province_id = $this->getProvinceID($record->departamento, $record->provincia);
                $antecedent->detective_id = $this->getDetectiveID($record->nombres);
                $antecedent->crime_id = $this->getCrimeID($record->causaarresto);
                $antecedent->import_id = Import::max('id');
                //$antecedent -> import_id = $this-> getImpotID(auth()->user()->id);
                $antecedent->save();
                $person = new Person();
                $person->arrestado = $record->arrestado;
                $person->ci = $record->ci;
                $person->nacido = $record->nacido;
                $person->nacionalidad = $record->nacionalidad;
                $person->edad = $record->edad;
                $person->genero = $record->genero;
                $person->foto = $record->fotopersona;
                $person->save();
                $detailant = new AntecedentPerson();
                $detailant->antecedent_id = Antecedent::max('id');
                $detailant->person_id = Person::max('id');
                $detailant->save();
                Record::destroy($record->id);
            }
            //Record::truncate();
            $this->recordallactions('Importacion de un archivo excel');
            return redirect('/admin/antecedentes')->with('info', 'Importación exitosa a la base de datos');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        
    }
    public function registrarantecedentesusuario1()
    {
        try {
            $count = Import::count('id');
            if ($count === 0) {
                $import_id = 2;
                $records = DB::table('records')->where('tiporegistro', 2)->get();
                
                //tabla import
                $import = new Import();
                $date = new DateTime();
                $import->id = $import_id;
                $import->fechaimport = $date->format('Y-m-d H:i:s');
                $import->user_id = auth()->user()->id;
                $import->save();
            } else {
                $records = DB::table('records')->where('tiporegistro', 2)->get();
                
                //tabla import
                $import = new Import();
                $date = new DateTime();
                $import->fechaimport = $date->format('Y-m-d H:i:s');
                $import->user_id = auth()->user()->id;
                $import->save();
            }
            
            foreach ($records as $record) { //echo $antecedent."\n";
                $antecedent = new Antecedent();
                $antecedent->gestion = $record->gestion;
                $antecedent->fechahecho = $record->fechahecho;
                $antecedent->hora = $record->hora;
                $antecedent->mesregistro = $record->mesregistro;
                $antecedent->municipio = $record->municipio;
                $antecedent->localidad = $record->localidad;
                $antecedent->zonabarrio = $record->zonabarrio;
                $antecedent->lugarhecho = $record->lugarhecho;
                $antecedent->gps = $record->gps;
                $antecedent->unidad = $record->unidad;
                $antecedent->temperancia = $record->temperancia;
                //$antecedent -> causaarresto = $record->;
                $antecedent->nathecho = $record->nathecho;
                $antecedent->arma = $record->arma;
                $antecedent->remitidoa = $record->remitidoa;
                $antecedent->pertenencias = $record->pertenencias;
                $antecedent->province_id = $this->getProvinceID($record->departamento, $record->provincia);
                $antecedent->detective_id = $this->getDetectiveID($record->nombres);
                $antecedent->crime_id = $this->getCrimeID($record->causaarresto);
                $antecedent->import_id = Import::max('id');
                //$antecedent -> import_id = $this-> getImpotID(auth()->user()->id);
                $antecedent->save();
                $person = new Person();
                $person->arrestado = $record->arrestado;
                $person->ci = $record->ci;
                $person->nacido = $record->nacido;
                $person->nacionalidad = $record->nacionalidad;
                $person->edad = $record->edad;
                $person->genero = $record->genero;
                $person->foto = $record->fotopersona;
                $person->save();
                $detailant = new AntecedentPerson();
                $detailant->antecedent_id = Antecedent::max('id');
                $detailant->person_id = Person::max('id');
                $detailant->save();
                Record::destroy($record->id);
            }
            //Record::truncate();
            $this->recordallactions('Importacion de un archivo excel');
            return redirect('/admin/antecedentes')->with('info', 'Datos guardados exitosamente');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        
    }
    public function import()
    {
        /* $records = Record::latest()->paginate(50);
        return view('admin.antecedentes.import_file', compact('records'))
            ->with('i', (request()->input('página', 1) - 1) * 5); */

        //$cantidad = Record::count('id')->where('tiporegistro', 1)->get();
        $cantidad = DB::table('records')->where('tiporegistro', 1)->count();
        $cantidad1 = DB::table('records')->where('tiporegistro', 2)->count();
        /* ->select(DB::raw('count(*) as user_count, tiporegistro'))
        ->where('tiporegistro', '<>', 1)
        ->get(); */
        //->count()->where('tiporegistro',1)->get();
        $i = 0;
        $records = Record::all();
        return view('admin.antecedentes.import_file', compact('records', 'i', 'cantidad', 'cantidad1'))->with('info', 'Datos subido con éxito');
    }
    public function deleterecordall($tiporegistro)
    {
        
        try {
            if ($tiporegistro === "1") {
            
                DB::table('records')->where('tiporegistro', '=', $tiporegistro)->delete();
                //return response()->json(['success'=>'Customer deleted!']);
                return redirect('admin/import')->with('info', 'La tabla de importación de excel se ha limpiado con éxto');
            } else {
                DB::table('records')->where('tiporegistro', '=', 2)->delete();
                return redirect('admin/import')->with('info', 'La datos registrados de los usuarios se ha limpiado con éxto');
            }
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        //return Excel::download(new UsersExport, 'users.'.$slug);
        return Excel::download(new AntecedentExport, 'antecedent.xlsx');
    }

    public function getProvinceID($departmentName, $provinceName)
    {
        if ($departmentName === NULL || $provinceName === NULL) {
            $province = Province::where('provincia', "CERCADO")->first();
            if ($province) {
                return $province->id;
            }
            $province = new Province();
            $province->provincia = "CERCADO";
            $department = Department::firstOrCreate([
                'departamento' => "ORURO"
            ]);
            $province->department_id = $department->id;
            $province->save();
            return $province->id;
        } else {
            $province = Province::where('provincia', $provinceName)->first();
            if ($province) {
                return $province->id;
            }
            $province = new Province();
            $province->provincia = $provinceName;
            $department = Department::firstOrCreate([
                'departamento' => $departmentName
            ]);
            $province->department_id = $department->id;
            $province->save();
            return $province->id;
        }
    }
    public function getDetectiveID($detectiveName)
    {
        if ($detectiveName === NULL) {
            $detective = Detective::firstOrCreate([
                'nombres' => "NINGUN OFICIAL A CARGO"
            ]);
            $detective->save();
            return $detective->id;
        } else {
            $detective = Detective::firstOrCreate([
                'nombres' => $detectiveName
            ]);
            $detective->save();
            return $detective->id;
        }
    }
    public function getCrimeID($crimeName)
    {
        if ($crimeName === NULL) {
            $ca = "NO SE HA DEFINIDO";
            $crime = Crime::firstOrCreate([
                'causaarresto' => $ca,
            ]);
            $crime->save();
            return $crime->id;
        } else {
            $crime = Crime::firstOrCreate([
                'causaarresto' => $crimeName
            ]);
            $crime->save();
            return $crime->id;
        }
    }
    public function getImpotID($idUser)
    {
        $import = new Import();
        $date = new DateTime();
        $import->fechaimport = $date->format('Y-m-d H:i:s');
        $import->user_id = $idUser;
        $import->save();
        return $import->id;
    }
    //Control acciones
    public function recordallactions($msg)
    {
        //Record::truncate();

        //acciones del usuario
        $action = new Action();
        $date = new DateTime();
        $action->usuario = auth()->user()->username;
        $action->accion = $msg;
        $action->fecha = $date->format('Y-m-d H:i:s');
        $action->save();
    }

    public function create()
    {
        return view('admin.antecedentes.create');
    }


    public function store(Request $request)
    {
        try {

            //control impotacion
            $min = Import::min('id');
            if ($min === 2) {
                $import_id = 1;
                $import = new Import();
                $date = new DateTime();
                $import->id = $import_id;
                $import->fechaimport = $date->format('Y-m-d H:i:s');
                $import->user_id = auth()->user()->id;
                $import->save();
            }
            //guardar antecedentes
            $antecedent = new Antecedent();
            $antecedent->gestion = $request->gestion;
            $antecedent->fechahecho = $request->fechahecho;
            $antecedent->hora = $request->hora;
            $antecedent->mesregistro = $request->mesregistro;
            $antecedent->municipio = $request->municipio;
            $antecedent->localidad = $request->localidad;
            $antecedent->zonabarrio = $request->zonabarrio;
            $antecedent->lugarhecho = $request->lugarhecho;
            $antecedent->gps = $request->gps;
            $antecedent->unidad = $request->unidad;
            $antecedent->temperancia = $request->temperancia;
            //$antecedent -> causaarresto = $request->;
            $antecedent->nathecho = $request->nathecho;
            $antecedent->arma = $request->arma;
            $antecedent->remitidoa = $request->remitidoa;
            $antecedent->pertenencias = $request->pertenencias;
            $antecedent->province_id = $this->getProvinceID($request->departamento, $request->provincia);
            $antecedent->detective_id = $this->getDetectiveID($request->nombres);
            $antecedent->crime_id = $this->getCrimeID($request->causaarresto);
            $antecedent->import_id = 1;
            //$antecedent -> import_id = $this-> getImpotID(auth()->user()->id);
            $antecedent->save();
            $person = new Person();
            $person->arrestado = $request->arrestado;
            $person->ci = $request->ci;
            $person->nacido = $request->nacido;
            $person->nacionalidad = $request->nacionalidad;
            $person->edad = $request->edad;
            $person->genero = $request->genero;
            $person->foto = 'persona.png';
            $person->save();
            $detailant = new AntecedentPerson();
            $detailant->antecedent_id = Antecedent::max('id');
            $detailant->person_id = Person::max('id');
            $detailant->save();
            //acciones del usuario
            $this->recordallactions('Antecedente registrado');

            return view('admin.antecedentes.create');
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function deleteallantecedents()
    {

        try {

            DB::table('antecedents')->delete();
            DB::table('provinces')->delete();
            DB::table('departments')->delete();
            DB::table('detectives')->delete();
            DB::table('crimes')->delete();
            DB::table('people')->delete();
            return view('admin.antecedentes.index', compact('cant_ant'))->with('info', 'La tabla antecedentes se ha limpiado con éxito');
            //return redirect('/admin/antecedentes')->with('info', 'La tabla antecedentes se ha limpiado con éxito');

        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function show($id) //show(Antecente $id)
    {
        $antecedent = Antecedent::with('people', 'detective', 'crime', 'province')->where('id', $id)->get();
        //echo $antecedent[0]->fechahecho;
        //$antecedent = Antecedent::find($id);
        return view('admin.antecedentes.show', compact('antecedent'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
        $record = Record::find($id);
        $record->delete();

        return redirect()->route('admin.antecedentes')->with('info', 'Se ha eliminado un registro');
    }
    public function deleter($id)
    {
        $delete = Record::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Registro eliminado con éxito";
        } else {
            $success = true;
            $message = "Registro no encontrado";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
