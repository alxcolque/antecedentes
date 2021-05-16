<?php

namespace App\Http\Controllers;

use App\Models\Antecedent;
use App\Models\Models\Image;
use App\Models\Person;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Http\Middleware\SoloModerador;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModeradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solomoder', ['only' => 'index']);
    }

    public function index()
    {
        return view('moders.index');
    }
    // Get all record === 2 
    public function getrecords()
    {
        $username = auth()->user()->username;
        if (request()->ajax()) {
            return datatables()->of(DB::table('records')
                ->where('tiporegistro', 3)
                ->where('username', $username)
                ->get(array(
                    'id',
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
                ->addColumn('detalle', 'moders.btn-detalle')
                ->rawColumns(['detalle'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function editimage(Request $request)
    {
        try {
            $folderPath = public_path('storage/personas/');

            $image_parts = explode(";base64,", $request->image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageName = uniqid() . '.png';

            $imageFullPath = $folderPath . $imageName;

            file_put_contents($imageFullPath, $image_base64);

            $saveFile = new Image();
            $saveFile->title = $imageName;
            $saveFile->save();
            $datos = array(
                'nombrefoto' => $imageName
            );
            //Devolvemos el array pasado a JSON como objeto

            return json_encode($datos, JSON_FORCE_OBJECT);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    //Enviar registro a la central
    public function enviarantecedentes()
    {
        $username = auth()->user()->username;
        try {

            DB::table('records')
                ->where('tiporegistro', 3)
                ->where('username', $username)
                ->update(['tiporegistro' => 2]);
            return redirect('moders')->with('info', 'Datos enviados exitosamente');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    //Elimianar todo
    public function deleterecordall($tiporegistro)
    {
        $username = auth()->user()->username;
        try {
            DB::table('records')
                ->where('tiporegistro', '=', 3)
                ->where('username', '=', $username)
                ->delete();
            return redirect('moders')->with('info', 'La tabla se han borrado con éxito');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $record = new Record();

            $record->gestion = $request->gestion;
            $record->fechahecho = $request->fechahecho;
            $record->hora = $request->hora;
            $record->mesregistro = $request->mesregistro;
            $record->departamento = $request->departamento;
            $record->provincia = $request->provincia;
            $record->municipio = $request->municipio;
            $record->localidad = $request->localidad;
            $record->zonabarrio = $request->gestion;
            $record->lugarhecho = $request->lugarhecho;
            $record->gps = $request->gps;
            $record->unidad = $request->unidad;
            $record->arrestado = $request->arrestado;
            $record->ci = $request->ci;
            $record->nacido = $request->nacido;
            $record->nacionalidad = $request->nacionalidad;
            $record->edad = $request->edad;
            $record->genero = $request->genero;
            $record->temperancia = $request->temperancia;
            $record->causaarresto = $request->causaarresto;
            $record->nathecho = $request->nathecho;
            $record->arma = $request->arma;
            $record->remitidoa = $request->remitidoa;
            $record->pertenencias = $request->pertenencias;
            $record->nombres = $request->nombres;
            $record->tiporegistro = 3;
            $record->fotopersona = $request->fotopersona;
            $record->username = auth()->user()->username;
            $record->save();

            return redirect('/moders')->with('info', 'Los datos se han guadado con éxito');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ver($id)
    {
        try {
            $where = array('id' => $id);
            $antecedent  = Record::where($where)->first();
            return view('moders.show', compact('antecedent'));
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function consulta()
    {
        $antecedents = [];
        return view('moders.consulta', compact('antecedents'));
    }
    public function resultadobusqueda(Request $request)
    {
        $texto = $request->get('text');
        if (strlen($texto) <= 0) {
            $antecedents = [];
            return view('moders.consulta', compact('antecedents'));
        }

        $antecedents = DB::table('antecedents')
            ->join('antecedent_person', 'antecedents.id', '=', 'antecedent_person.antecedent_id')
            ->join('people', 'antecedent_person.person_id', '=', 'people.id')
            ->join('crimes', 'antecedents.crime_id', '=', 'crimes.id')
            ->join('detectives', 'antecedents.detective_id', '=', 'detectives.id')
            ->join('provinces', 'antecedents.province_id', '=', 'provinces.id')
            ->join('departments', 'provinces.department_id', '=', 'departments.id')
            ->where('people.arrestado', 'LIKE', '%' . $texto . '%')
            ->get(array(
                'antecedents.id',
                'arrestado',
                'ci',
                'foto',
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
            ));
        $i = 0;
        return view('moders.consulta', compact('antecedents', 'i'));
    }
    public function search(Request $request)
    {
        try {
            $term = $request->get('term');
            $querys = Person::where('arrestado', 'LIKE', '%' . $term . '%')->get();
            //$querys = Antecedent::with('people', 'detective', 'crime', 'province')->where('arrestado', 'LIKE','%'.$term.'%')->get();
            /* $querys = DB::table('people')
            ->select('arrestado')
            ->where('arrestado', 'LIKE','%'.$term.'%'); */
            //->orWhere('ci','LIKE','%'.$term.'%');
            //return $query;
            $data = [];
            foreach ($querys as $query) {
                $data[] = [
                    'label' => $query->arrestado //.' (CI:) '.$query->ci,
                ];
            }
            return $data;
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            //return $id;
            $record = Record::find($id);
            $record->update([
                'gestion' => $request->gestion, //Carbon::parse()->format('Y-m-01'),
                'fechahecho' => $request->fechahecho,
                'hora' => $request->hora,
                'mesregistro' => $request->mesregistro,
                'departamento' => $request->departamento,
                'provincia' => $request->provincia,
                'municipio' => $request->municipio,
                'localidad' => $request->localidad,
                'zonabarrio' => $request->zonabarrio,
                'lugarhecho' => $request->lugarhecho,
                'gps' => $request->gps,
                'unidad' => $request->unidad,
                'arrestado' => $request->arrestado,
                'ci' => $request->ci,
                'nacido' => $request->nacido,
                'nacionalidad' => $request->nacionalidad,
                'edad' => $request->edad,
                'genero' => $request->genero,
                'temperancia' => $request->temperancia,
                'causaarresto' => $request->causaarresto,
                'nathecho' => $request->nathecho,
                'arma' => $request->arma,
                'remitidoa' => $request->remitidoa,
                'nombres' => $request->nombres,
                'pertenencias' => $request->pertenencias,
                'fotopersona' => $request->fotopersona,
                //'tiporegistro' => 1,

            ]);
            return back()->with('info', 'Registro actualizado con éxito');
            //return response()->json(['success' => 'Registro actualizado con éxito']);//->with('info', 'Registro actualizado con éxito');*/
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
    public function deleter($id)
    {
        try {
            Record::destroy($id);
            return redirect('/moders')->with('info', 'Registro Eliminado con éxito');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    ///perfil
    public function perfil()
    {
        $user = Auth::user();
        return view('moders.perfil', compact('user'));
    }
}
