<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Hash;
use PDF;
use Validator;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
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
                    'updateuser',
                    'store',
                    'show',
                    'edit',
                    'update',
                    'destroy',
                    'recordallactions'
                ]
            ]
        );
    }
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.controlusuarios.index', compact('users'));
        /*if(request()->ajax()) {
            return datatables()->of(User::select('*'))
            ->addColumn('action', '')
            ->addColumn('image', 'image')
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.controlusuarios.index');*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'confirm_password' => 'required',
            'rol' => 'required'
        ]);


        //try {
        if ($validator->passes()) {

            $save = new User;
            $save->name = $request->name;
            $save->lastname = $request->lastname;
            $save->username = $request->username;
            $save->email = $request->email;
            $save->password = Hash::make($request->password);
            $save->foto = 'user.png';
            $save->rol = $request->rol;
            $save->save();
            $this->recordallactions("Usuario " . $request->username . ' Creado');
            return response()->json(['success' => 'Usuario creado con ??xito. ']);
            //
        }
        return response()->json(['error' => $validator->errors()->all()]);
        /*} catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }*/
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $user  = User::where($where)->first();
        //$product = Product::find($id);
        //return response()->json($product);
        return response()->json($user);
    }


    public function update(Request $request, $id)
    {
        //return response()->json(['success'=>'Usuario  Actualizado con ??xito.']);
    }

    // obteniendo el 'user_agent':
    //


    public function updateuser(Request $request)
    {
        try {
            $record = User::find($request->id);
            if($request->rol == 1){
                $rolname = "ADMIN";
            }
            else if($request->rol == 2){
                $rolname = "USUARIO1";
            }else{
                $rolname = "COSULTOR";
            }
            if($record->rol == 1){
                $rolname1 = "ADMIN";
            }
            else if($request->rol == 2){
                $rolname1 = "USUARIO1";
            }else{
                $rolname1 = "COSULTOR";
            }
            $record->update([
                'rol' => $request->rol,
            ]);
            $this->recordallactions("Se cambi?? rol para ".$record->username. ' de '.$rolname1.' al '.$rolname );
            //return back()->with('info', 'Registro actualizado con ??xito');
            return response()->json(['success' => 'Usuario actualizado con ??xito']); //->with('info', 'Registro actualizado con ??xito');*/
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }


    public function destroy($id)
    {
        if (auth()->user()->id == $id) {
            //return back()->with('warning','No puedes eliminar a este administrador');
            return response()->json(['warning' => 'No puedes eliminar a este administrador']);
        } else {
            $user  = User::where('id', $id)->first();
            $user->delete();
            $this->recordallactions("Usuario " . $user->username . " Eliminado");
            return response()->json(['success' => 'Usuario ' . $user->username . ' Eliminado con ??xito.']);
        }
    }

    public function recordallactions($msg)
    {
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
