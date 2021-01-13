<?php

namespace App\Http\Controllers;

use App\Asignaturas;
use App\Preguntas;
use App\Unidades;
use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($unidades)
    {
        $unidad= Unidades::findorfail($unidades);
        $id= $unidad->idAsignatura;
        $asignature= Asignaturas::findorfail($id);
        $pregunta= Preguntas::all();
        $find=Preguntas::where("idUnidad", "LIKE", "%$unidades%")->get();

        return view('preguntas.index', compact('unidad', 'find', 'pregunta', 'asignature'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idUnidad)
    {
        return view('preguntas.create',compact('idUnidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validateData= $request->validate([
            'pregunta' => 'required',
            'dificultad' => 'required|max: 4',
            'idUnidad'=>'required'
        ]);

        $preguntas = new Preguntas();
        $preguntas->pregunta = $request->input('pregunta');
        $preguntas->dificultad = $request->input('dificultad');
        $preguntas->idUnidad = $request->input('idUnidad');
        $preguntas->save();

        return redirect()->to(url('/preguntas',['id' => $id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function show(Preguntas $preguntas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preguntas  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($pregunta)
    {
        $preguntas=Preguntas::findorfail($pregunta);

        return view('preguntas.edit', compact('find', 'preguntas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $preguntas)
    {
        $validateData= $request->validate([
            'pregunta' => 'required',
            'dificultad' => 'required|max: 4',
            'idUnidad'=>'required'
        ]);
        $id= $request->input('idUnidad');

        $pregunta = Preguntas::find($preguntas);
        $pregunta->pregunta = $request->input('pregunta');
        $pregunta->dificultad = $request->input('dificultad');
        $pregunta->idUnidad = $request->input('idUnidad');
        $pregunta->save();

        return redirect()->to(url('/preguntas',['id' => $id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function destroy($preguntas, $idUnidad)
    {
        Preguntas::destroy($preguntas);
        return redirect()->to(url('/preguntas',['id' => $idUnidad]));

        //
    }
}
