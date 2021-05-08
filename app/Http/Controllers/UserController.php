<?php

namespace App\Http\Controllers;

use App\Models\Models\Image;
use App\Models\User;
use Illuminate\Http\Middleware\SoloUser;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /*public function index()
    {
        return view('usuario');
    }*/

    public function profileimage(Request $request)
    {
        try {
            $folderPath = public_path('storage/users/');

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
        try {
            //return $id;
            $record = User::find($id);
            $record->update([
                'foto' => $request->foto, //Carbon::parse()->format('Y-m-01'),
                'name' => $request->name,
                'lastname' => $request->lastname,
            ]);
            return back()->with('info', 'Registro actualizado con éxito');
            //return response()->json(['success' => 'Registro actualizado con éxito']);//->with('info', 'Registro actualizado con éxito');*/
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
    public function perfil()
    {
        $user = Auth::user();
        return view('moders.perfil', compact('user'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.perfil', compact('user'));
    }
    //resetpass
    public function resetpass()
    {
        //$user = Auth::user();
        return 'Hola d';
    }
}
