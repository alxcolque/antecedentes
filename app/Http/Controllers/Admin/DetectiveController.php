<?php

namespace App\Http\Controllers\Admin;

use App\Models\Detective;
use App\Http\Controllers\Controller;
use App\Models\Action;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetectiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(
            'soloadmin',
            [
                'only' => [
                    'index',
                    'create',
                    'recordallactions',
                    'store',
                    'show',
                    'edit',
                    'update',
                    'destroy',
                ]
            ]
        );
    }
    public function index()
    {
        //
        $Detecti = Detective::orderBy('id', 'desc')->get();
        return view('admin.detectives.index', compact('Detecti'));
        /*
        $datos['detective']=Detective::paginate(5);
        return view('admin.detectives.index',$datos);*/
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
    public function edit(Detective $detective)
    {
        return view('admin.detectives.edit', compact('detective'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detective $detective)
    {
        $request->validate([
            'nombres' => 'required',
        ]);
        $detective->update($request->all());
        $this->recordallactions('El personal policial '.$request->nombres.' ha sido editado');
        return redirect()->route('admin.detectives.index')->with('info', 'Personal policial se actualizó con éxito');
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
        Detective::destroy($id);
        return  redirect('admin/detectives');
    }

    public function recordallactions($msg)
    {

         //Record::truncate();
         $actioncount = DB::table('actions')->count();
        
         if($actioncount == 0){
             $id = 0;
         }
         else{
             $id = DB::table('actions')->max('id');
         }
         //acciones del usuario
         $action = new Action();
         $date = new DateTime();
         $action->id = $id+1;
         $action->usuario = auth()->user()->username;
         $action->accion = $msg;
         $action->fecha = $date->format('Y-m-d H:i:s');
         $action->save();
    }
}
