<?php

namespace App\Http\Controllers;

use App\Asignaturas;
use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function __construct(){
        $this->middleware('auth');
    }*/

    public function index()
    {
        $asignature= Asignaturas::all();

        return view('asignaturas.index', compact('asignature'));

        //return view('asignaturas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData= $request->validate([
            'nombreAsignatura' => 'required',
            'numUnidades' => 'required|max: 8',
        ]);

        $asignature = new Asignaturas();
        $asignature->nombreAsignatura = $request->input('nombreAsignatura');
        $asignature->numUnidades = $request->input('numUnidades');
        $asignature->save();

        return redirect()->route('asignaturas.index', [$asignature])->with('status',"Asignatura agregado correctamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignaturas  $asignaturas
     * @return \Illuminate\Http\Response
     */
    public function show(Asignaturas $asignaturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignaturas  $asignature
     * @return \Illuminate\Http\Response
     */
    public function edit( $asignature)
    {
        $asignature=Asignaturas::findorfail($asignature);
        return view('asignaturas.edit', compact('asignature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asignaturas  $asignaturas_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $asignaturas_id)
    {
        $validateData= $request->validate([
            'nombreAsignatura' => 'required',
            'numUnidades' => 'required|max: 8',
        ]);

        $asignature = Asignaturas::find($asignaturas_id);
        $asignature->nombreAsignatura = $request->input('nombreAsignatura');
        $asignature->numUnidades = $request->input('numUnidades');
        $asignature->save();

        return redirect()->route('asignaturas.index', [$asignature])->with('status',"Asignatura editado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignaturas  $asignaturas_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($asignaturas_id)
    {
        Asignaturas::destroy($asignaturas_id);

        return redirect()->route('asignaturas.index', [$asignaturas_id])->with('status',"Asignatura eliminada correctamente");
    }
}
