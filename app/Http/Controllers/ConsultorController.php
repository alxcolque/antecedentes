<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solouser',['only'=> ['index']]);

    }
    public function index()
    {
        $antecedents = [];
        return view('consultor.index', compact('antecedents'));
    }
    public function resultadobusqueda(Request $request)
    {
        $texto = $request->get('text');
        if (strlen($texto) <= 0) {
            $antecedents = [];
            return view('consultor.index', compact('antecedents'));
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
        return view('consultor.index', compact('antecedents', 'i'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}
