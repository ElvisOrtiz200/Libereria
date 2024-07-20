<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Recursobibliografico;
use App\Models\Desecho_Recurso;

class Desecho_RecursoController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAG = 5;
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
        $desecho_recurso = Desecho_Recurso::where('estado','=','1')->where('idRecuDesecho','like','%'.$buscarpor.'%')->paginate($this::PAG);
        return view('desecho_recurso.index',compact('desecho_recurso','buscarpor'));
    }

    public function byProject($id){
      return   Desecho_Recurso::where('idRecuDesecho',$id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $desecho_recurso =  Desecho_Recurso::where('estado','=','1')->get();
        $recursobibliografico = Recursobibliografico::where('estado','=','1')->get();
        return view('desecho_recurso.create',compact('desecho_recurso','recursobibliografico'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'Descripcion'=>'required|max:100|',
            'Fecha'=>'required|min:1',
        ],[
            'Descripcion.required'=>'Ingrese la descripcion!!!',
            'Fecha.required'=>'Ingrese la Fecha!!!'
        ]);
        $desecho_recurso = new Desecho_Recurso();
        $desecho_recurso->idRecurso = $request->idRecurso;
        $desecho_recurso->Descripcion = $request->Descripcion;
        $desecho_recurso->Fecha = $request->Fecha;
        $desecho_recurso->estado = '1';
        $desecho_recurso->save();

         // Cambiar el estado del recurso bibliográfico asociado a 0
         $recursobibliografico = Recursobibliografico::findOrFail($request->idRecurso);
         $recursobibliografico->estado = '0';
         $recursobibliografico->save();

        return redirect()->route('desecho_recurso.index')->with('datos','¡Registro guardado!');
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
        $desecho_recurso = Desecho_Recurso::findOrFail($id);
        $recursobibliografico = Recursobibliografico::where('estado','=','1')->get();
        return view('desecho_recurso.edit', compact('desecho_recurso','recursobibliografico'));
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
        $data = request()->validate([
            'Descripcion'=>'required|max:100|',
            'Fecha'=>'required|min:1',
        ],[
            'Descripcion.required'=>'Ingrese la descripcion!!!',
            'Fecha.required'=>'Ingrese la Fecha!!!'
        ]);
        $desecho_recurso = Desecho_Recurso::findOrFail($id);
        $desecho_recurso->idRecurso = $request->idRecurso;
        $desecho_recurso->Descripcion = $request->Descripcion;
        $desecho_recurso->Fecha = $request->Fecha;
        $desecho_recurso->estado = '1';
        $desecho_recurso->save();
        return redirect()->route('desecho_recurso.index')->with('datos','¡Registro actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desecho_recurso =  Desecho_Recurso::findOrFail($id);
        $desecho_recurso->estado = '0';
        $desecho_recurso->save();

        
        
        return redirect()->route('desecho_recurso.index')->with('datos','¡Registro eliminado!');
    }

    

    public function confirmar($id) {
        $desecho_recurso = Desecho_Recurso::findOrFail($id);
        $recursobibliografico = Recursobibliografico::where('estado','=','1')->get();
        return view('desecho_recurso.confirmar', compact('desecho_recurso','recursobibliografico'));
    }
}
