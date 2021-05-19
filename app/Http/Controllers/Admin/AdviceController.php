<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdviceController extends Controller
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
                    'adviceimage',
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
        $advices = Advice::orderBy('id', 'desc')->get();
        return view('admin.avisos.index', compact('advices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.avisos.create',);
    }
    public function adviceimage(Request $request)
    {
        try {
            $folderPath = public_path('storage/avisos/');

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
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required'
        ]);
        $advice = Advice::create([
            'titulo' => $request->titulo,
            'imagen' => $request->imagen,
            'descripcion' => $request->descripcion,

        ]);
        return redirect()->route('admin.avisos.index')->with('info', 'El aviso se creó con éxito');
    }

    public function show(Advice $advice)
    {
        return view('admin.avisos.show', compact('advice'));
    }

    public function edit(Advice $aviso)
    {
        return view('admin.avisos.edit', compact('aviso'));
    }

    public function update(Request $request, Advice $aviso)
    {
        $request->validate([
            'titulo' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required'
        ]);
        $aviso->update($request->all());
        return redirect()->route('admin.avisos.index')->with('info', 'El aviso se actualizó con éxito');
        /*$aviso->update($request->all());
        if ($request->file('file')) {
            //$url = Storage::put('avisos', $request->file('file'));
            if ($aviso->imagen) {
                Storage::delete($aviso->imagen);
                $aviso->update([
                    'imagen' => Storage::put('avisos', $request->file('file')),
                ]);
            } else {
                $aviso->create([
                    'titulo' => $request->titulo,
                    'imagen' => Storage::put('avisos', $request->file('file')),
                    'descripcion' => $request->descripcion,
                ]);
            }
        }*/
        /* $aviso -> update($request->only(['titulo','imagen','descripcion']));
        if($request->hasFile('file')){
            $imagen = $request->file('file')->getClientOriginalName();
        } */
    }

    public function destroy(Advice $aviso)
    {
        $aviso->delete();
        return redirect()->route('admin.avisos.index')->with('info', 'El aviso se eliminó correctamente');
    }
}
