@extends('layouts.app')

@section('content')

    <h2 align="center"> Respuestas </h2>

    <form class="form-group" action="{{route('respuestas.update',$respuesta->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <label for="respuesta">{{'Respuesta'}}</label>
        <input class="form-control" type="text" name="respuesta" id="respuesta" value="{{$respuesta->respuesta}}" placeholder="Pregunta" required>

        <label for="resultado">{{'Resultado'}}</label>
        <select class="form-control"  name="resultado" id="resultado" value="resultado" required>
            <option value="correcto" @if($respuesta->resultado==='correcto') selected='selected' @endif>Correcto</option>
            <option value="incorrecto" @if($respuesta->resultado==='incorrecto') selected='selected' @endif>Incorrecto</option>

        </select>

        <label for="idPregunta">{{'Id Pregunta'}}</label>
        <input class="form-control" type="number" min="1" step="1" name="idPregunta" id="idPregunta" value="{{$respuesta->idPregunta}}" required readonly >
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection
