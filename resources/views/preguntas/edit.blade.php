@extends('layouts.app')

@section('content')

    <h2 align="center"> Preguntas </h2>

    <form class="form-group" action="{{route('preguntas.update',$preguntas->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}

        <label for="pregunta">{{'Pregunta'}}</label>
        <input class="form-control" type="text" name="pregunta" id="pregunta" value="{{$preguntas->pregunta}}" placeholder="Pregunta" required>

        <label for="dificultad">{{'Dificultad'}}</label>
        <select class="form-control"  name="dificultad" id="dificultad" value="{{$preguntas->dificultad}}" required>
            <option value="1">Facil</option>
            <option value="2">Medio</option>
            <option value="3">Dificil</option>
        </select>

        <label for="idUnidad">{{'Id Unidad'}}</label>
        <input class="form-control" type="number" min="1" step="1" name="idUnidad" id="idUnidad" value="{{$preguntas->idUnidad}}" required readonly >
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection
