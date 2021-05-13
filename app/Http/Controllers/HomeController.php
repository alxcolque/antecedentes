<?php

namespace App\Http\Controllers;

use App\Models\Antecedent;
use App\Models\Detective;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Middleware\SoloAdmin;
use Illuminate\Support\Facades\DB;
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
        $this->middleware('soloadmin', ['only' => ['index']]);
    }

    public function index()
    {
        $antecedents = [];
        $cant_ant = Antecedent::count();
        $cant_preant = DB::table('records')->where('tiporegistro', 2)->count();
        $cant_pol = Detective::count();
        return view('home', compact('cant_ant', 'cant_preant', 'cant_pol', 'antecedents'));
    }
    public function tbtljsonantecedentes()
    {
        return datatables()->of(Antecedent::all())->toJson();
    }
    public function resultadobusqueda(Request $request)
    {
        $cant_ant = Antecedent::count();
        $cant_preant = DB::table('records')->where('tiporegistro', 2)->count();
        $cant_pol = Detective::count();
        $texto = $request->get('text');
        if (strlen($texto) <= 0) {
            $antecedents = [];


            return view('home', compact('cant_ant', 'cant_preant', 'cant_pol', 'antecedents'));
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
        return view('home', compact('i','cant_ant', 'cant_preant', 'cant_pol', 'antecedents'));
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
}
