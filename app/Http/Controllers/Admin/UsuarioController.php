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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'confirm_password'=>'required',
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
                $this->recordallactions("Usuario ".$request->username.' Creado');
                return response()->json(['success' => 'Usuario creado con éxito. ']);
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

        //return Response::json($user);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        if(auth()->user()->id == $id){
            //return back()->with('warning','No puedes eliminar a este administrador');
            return response()->json(['warning' => 'No puedes eliminar a este administrador']);
        }else{
            $user  = User::where('id',$id)->first();
            $user->delete();
            $this->recordallactions("Usuario ".$user->username." Eliminado");
            return response()->json(['success'=>'Usuario '.$user->username.' Eliminado con Éxito.']);
        }
        
    }

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
}
