<?php

namespace App\Http\Controllers;

use App\Asignaturas;
use App\Unidades;
use App\Preguntas;
use App\Respuestas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($preguntas)
    {
        $pregunta= Preguntas::findorfail($preguntas);
        $id= $pregunta->idUnidad; //id de la unidad
        $unidad= Unidades::findorfail($id); //En unidad busca por id
        $idAsig= $unidad->idAsignatura;//Id de la asignatura
        $asignature= Asignaturas::findorfail($idAsig); //En asignaturas busca el idAsig
        $respuesta= Respuestas::all();

        $find=Respuestas::where("idPregunta", "LIKE", "%$preguntas%")->get();
        return view('respuestas.index', compact('unidad','pregunta', 'asignature','respuesta', 'find'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idPregunta)
    {
        $resultados = array();
        //$preguntas= Respuestas::all();
        $find=Respuestas::where("idPregunta", "LIKE", "%$idPregunta%")->get();
        foreach($find as $t){
            $resultados[] = $t->resultado;
        }
        Log::info("Logging one variable: " . print_r($resultados, true));
        $valor=1;

        if(count($resultados)==0){

        }else{
            for($i=0; $i < count($resultados); $i++){
                if ($resultados[$i]=="correcto"){
                    $valor=0;
                }
            }
        }

        return view('respuestas.create',compact('valor', 'resultados', 'preguntas', 'idPregunta'));
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
            'respuesta' => 'required',
            'resultado' => 'required',
            'idPregunta'=>'required'
        ]);

        $resultados = new Respuestas();
        $resultados->respuesta = $request->input('respuesta');
        $resultados->resultado = $request->input('resultado');
        $resultados->idPregunta = $request->input('idPregunta');
        $resultados->save();

        return redirect()->to(url('/respuestas',['id' => $id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Respuestas  $respuestas
     * @return \Illuminate\Http\Response
     */
    public function show(Respuestas $respuestas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Respuestas  $respuestas
     * @return \Illuminate\Http\Response
     */
    public function edit( $respuestas)
    {
        $respuesta=Respuestas::findorfail($respuestas);
        return view('respuestas.edit', compact('respuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Respuestas  $respuestas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $respuestas)
    {
        $validateData= $request->validate([
            'respuesta' => 'required',
            'resultado' => 'required',
            'idPregunta'=>'required'
        ]);
        $id= $request->input('idPregunta');

        $respuesta = Preguntas::find($respuestas);
        $respuesta->respuesta = $request->input('respuesta');
        $respuesta->resultado = $request->input('resultado');
        $respuesta->idPregunta = $request->input('idPregunta');
        $respuesta->save();

        return redirect()->to(url('/respuestas',['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Respuestas  $respuestas
     * @return \Illuminate\Http\Response
     */
    public function destroy($respuestas, $idPregunta)
    {
        Respuestas::destroy($respuestas);
        return redirect()->to(url('/respuestas',['id' => $idPregunta]));
    }
}
