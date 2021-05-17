<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Carrusel;
use App\Models\Models\Image;
use Illuminate\Http\Request;

class CarruselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carruseles = Carrusel::orderBy('id', 'desc')->get();
        return view('admin.carruseles.index',compact('carruseles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.carruseles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);
        $carrusel = Carrusel::create([
            'title' => $request->title,
            'image' => $request->image,
            'description' => $request->description,

        ]);
        return redirect()->route('admin.carruseles.index')->with('info', 'Carrusel creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Carrusel $carrusel)
    {
        return view('admin.carruseles.edit', compact('carrusel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrusel $carrusele)
    {
        return view('admin.carruseles.edit', compact('carrusele'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrusel $carrusele)
    {
        $request->validate([
            'title' => 'required',
            'image'=>'required',
            'description' => 'required'
        ]);
        $carrusele->update($request->all());
        return redirect()->route('admin.carruseles.index')->with('info', 'El carrusel se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrusel $carrusele)
    {
        $carrusele->delete();
        return redirect()->route('admin.carruseles.index')->with('info', 'El carrusel se eliminó correctamente');
    }
    //Guardar imagen
    public function caruselimage(Request $request)
    {
        try {
            $folderPath = public_path('storage/carruseles/');

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
}
