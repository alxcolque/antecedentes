<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('admin.avisos.create');
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
            'titulo' => 'required',
            'file' => 'required|image',
            'descripcion' => 'required'
        ]);

        //$advice = Advice::create($request->all());
        $advice = Advice::create([
            'titulo' => $request->titulo,
            'imagen' => Storage::put('avisos', $request->file('file')),
            'descripcion' => $request->descripcion,

        ]);
        /*if($request->file('file')){
            $url = Storage::put('avisos',$request->file('file'));
        }*/ 
        return redirect()->route('admin.avisos.index', $advice)->with('info', 'El aviso se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advice $advice)
    {
        return view('admin.avisos.show', compact('advice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advice $aviso)
    {
        return view('admin.avisos.edit', compact('aviso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advice $aviso)
    {
        $request->validate([
            'titulo' => 'required',
            //'file'=>'required|image',
            'descripcion' => 'required'
        ]);
        //echo Storage::put('avisos', $request->file('file'));
        /*echo $request->file('file');
        echo $request->file;
        return $aviso;*/
        $aviso->update($request->all());
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
        }
        /* $aviso -> update($request->only(['titulo','imagen','descripcion']));
        if($request->hasFile('file')){
            $imagen = $request->file('file')->getClientOriginalName();
        } */
        return redirect()->route('admin.avisos.index', $aviso)->with('info', 'El aviso se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advice $aviso)
    {
        $aviso->delete();
        return redirect()->route('admin.avisos.index')->with('info', 'El aviso se eliminó correctamente');
    }
}
