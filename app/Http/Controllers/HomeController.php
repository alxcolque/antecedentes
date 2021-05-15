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

        $data['year_list'] = $this->fetch_year();


        return view('home', compact('cant_ant', 'cant_preant', 'cant_pol', 'antecedents'))->with($data);
    }
    //Charts
    public function fetch_year() {
        $data = DB::table('antecedents')
        ->select(DB::raw('gestion'))
        ->groupBy('gestion')
        ->orderBy('gestion', 'DESC')->get();
        return $data;
    }
    
    public function fetch_data(Request $request)
    {
        if ($request->input('year')) {

            $chart_data = $this->fetch_chart_data($request->input('year'));

            foreach ($chart_data->toArray() as $row) {

                $output[] = array(
                    'month'  => $row->mesregistro,
                    'profit' => floatval($row->cant)
                );
            }

            echo json_encode($output);
        }
    }

    function fetch_chart_data($year)
    {
        $data =  DB::table('antecedents')
        ->select(DB::raw('mesregistro'),DB::raw('count(*) as cant'))
        ->groupby('gestion','mesregistro')
        ->where('gestion',$year)
        //->orderBy('mesregistro', 'ASC')
        ->get();
        return $data;
    }
    //End Charts
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

        $data['year_list'] = $this->fetch_year();

        if (strlen($texto) <= 0) {
            $antecedents = [];


            return view('home', compact('cant_ant', 'cant_preant', 'cant_pol', 'antecedents'))->with($data);
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
        return view('home', compact('i', 'cant_ant', 'cant_preant', 'cant_pol', 'antecedents'))->with($data);
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
