<?php

namespace App\Http\Controllers\Admin;

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

class AntecedenteController extends Controller
{
    public function index(Request $request)
    {
        
        //$antecedents = Antecedent::with('people', 'detective', 'crime', 'province')->limit(8)->get();;
        $date = new DateTime();
        $hoy = $date->format('Y');
        //echo $hoy;
        if(request()->ajax()) {
            return datatables()->of(DB::table('antecedents')
            ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
            ->join('people', 'antecedent_person.person_id', '=', 'people.id')
            ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
            ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
            ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
            ->join('departments', 'provinces.id', '=', 'departments.id')
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
        return view('admin.antecedentes.index');
    }
    public function filterbydate(Request $request)
    {
        //$this->filtroAntecedente('12/01/2020', '12/30/2020');
        
        if(request()->ajax()) {
            return datatables()->of(DB::table('antecedents')
            ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
            ->join('people', 'antecedent_person.person_id', '=', 'people.id')
            ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
            ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
            ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
            ->join('departments', 'provinces.id', '=', 'departments.id')
            ->where('gestion', ['2020'])
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
    public function buscarPorYear(Request $request)
    {
        //echo $request['gestion'];
        if(request()->ajax()) {
            return datatables()->of(DB::table('antecedents')
            ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
            ->join('people', 'antecedent_person.person_id', '=', 'people.id')
            ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
            ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
            ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
            ->join('departments', 'provinces.id', '=', 'departments.id')
            ->where('gestion', ['2020'])
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

        $request->session()->put('success', 'Your file is imported successfully in database.');

        return redirect('admin/import'); //->with('status', 'Archivo procesado correctamente');
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
    public function registrarimport()
    {
        $records = Record::get();

        //tabla import
        $import = new Import();
        $date = new DateTime();
        $import->fechaimport = $date->format('Y-m-d H:i:s');
        $import->user_id = auth()->user()->id;
        $import->save();

        foreach ($records as $record) { //echo $antecedent."\n";
            $antecedent = new Antecedent();
            $antecedent->gestion = $record->gestion;
            $antecedent->fechahecho = jdtogregorian(($record->fechahecho) + 2415032);
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
            $person->save();
            $detailant = new AntecedentPerson();
            $detailant->antecedent_id = Antecedent::max('id');
            $detailant->person_id = Person::max('id');
            $detailant->save();
        }
        Record::truncate();

        //acciones del usuario
        $action = new Action();
        $date = new DateTime();
        $action->usuario = auth()->user()->nombreusuario;
        $action->accion = "Importacion de un archivo";
        $action->fecha = $date->format('Y-m-d H:i:s');
        $action->save();


        return redirect('/admin/antecedentes');
    }
    public function import()
    {
        /* $records = Record::latest()->paginate(50);
        return view('admin.antecedentes.import_file', compact('records'))
            ->with('i', (request()->input('página', 1) - 1) * 5); */
        $cantidad = Record::count('id');
        $i = 0;
        $records = Record::all();
        return view('admin.antecedentes.import_file', compact('records', 'i', 'cantidad'))->with('info', 'El aviso se creó con éxito');
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function exportExcelCSV($slug)
    {
        //return Excel::download(new UsersExport, 'users.'.$slug);
    }

    public function getProvinceID($departmentName, $provinceName)
    {
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
    public function getDetectiveID($detectiveName)
    {

        $detective = Detective::firstOrCreate([
            'nombres' => $detectiveName
        ]);
        $detective->save();
        return $detective->id;
    }
    public function getCrimeID($crimeName)
    {

        $crime = Crime::firstOrCreate([
            'causaarresto' => $crimeName
        ]);
        $crime->save();
        return $crime->id;
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

    public function create()
    {
        return view('admin.antecedentes.create');
    }


    public function store(Request $request)
    {
        //tabla import
        $import = new Import();
        $date = new DateTime();
        $import->fechaimport = $date->format('Y-m-d H:i:s');
        $import->user_id = auth()->user()->id;
        $import->save();
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
        $antecedent->import_id = Import::max('id');
        //$antecedent -> import_id = $this-> getImpotID(auth()->user()->id);
        $antecedent->save();
        $person = new Person();
        $person->arrestado = $request->arrestado;
        $person->ci = $request->ci;
        $person->nacido = $request->nacido;
        $person->nacionalidad = $request->nacionalidad;
        $person->edad = $request->edad;
        $person->genero = $request->genero;
        $person->foto = 'arrestado.png';
        $person->save();
        $detailant = new AntecedentPerson();
        $detailant->antecedent_id = Antecedent::max('id');
        $detailant->person_id = Person::max('id');
        $detailant->save();
        //acciones del usuario
        $action = new Action();
        $date = new DateTime();
        $action->usuario = auth()->user()->nombreusuario;
        $action->accion = "Un antecedentes registrado";
        $action->fecha = $date->format('Y-m-d H:i:s');
        $action->save();
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
        //
    }
}
