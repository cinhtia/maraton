<?php

namespace App\Http\Controllers;

use App\Asignaturas;
use App\Unidades;
use Illuminate\Http\Request;

class UnidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($idAsignatura)
    {
        $asignature= Asignaturas::findorfail($idAsignatura);
        $unidades= Unidades::all();
        $find=Unidades::where("idAsignatura", "LIKE", "%$idAsignatura%")->get();

        return view('unidades.index', compact('asignature','unidades', 'find'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idAsignatura)
    {
        return view('unidades.create',compact('idAsignatura'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $validateData= $request->validate([
            'nombreUnidad' => 'required',
            'numUnidad' => 'required|max: 8',
            'idAsignatura'=>'required'
        ]);

        $unidades = new Unidades();
        $unidades->nombreUnidad = $request->input('nombreUnidad');
        $unidades->numUnidad = $request->input('numUnidad');
        $unidades->idAsignatura = $request->input('idAsignatura');
        $unidades->save();

        return redirect()->to(url('/unidades',['id' => $id]));
        //return redirect()->route('unidades.index', [$id])->with('status',"Asignatura agregado correctamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function show(Unidades $unidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function edit( $unidades)
    {
        $unidad=Unidades::findorfail($unidades);
        return view('unidades.edit', compact('unidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $unidades)
    {
        $validateData= $request->validate([
            'nombreUnidad' => 'required',
            'numUnidad' => 'required|max: 8',
            'idAsignatura'=>'required'
        ]);

        $id= $request->input('idAsignatura');

        $unidad = Unidades::find($unidades);
        $unidad->nombreUnidad = $request->input('nombreUnidad');
        $unidad->numUnidad = $request->input('numUnidad');
        $unidad->idAsignatura = $request->input('idAsignatura');
        $unidad->save();

        return redirect()->to(url('/unidades',['id' => $id]));
        //return redirect()->route('unidades.index', $id)->with('status',"Unidad editado correctamente");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unidades  $unidades
     * @return \Illuminate\Http\Response
     */
    public function destroy( $unidades, $idAsignatura)
    {
        Unidades::destroy($unidades);
        return redirect()->to(url('/unidades',['id' => $idAsignatura]));
        //return redirect()->route('unidades/', [$idAsignatura])->with('status',"Unidad eliminada correctamente");

    }
}
