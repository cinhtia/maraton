@extends('layouts.app')

@section('content')

    <h2 align="center"> Agregar respuestas </h2>

    <form class="form-group" action="{{url('/respuestas/'.$idPregunta.'')}}" method="post">
        {{csrf_field()}}
        <label for="respuesta">{{'Respuesta'}}</label>
        <input class="form-control" type="text" name="respuesta" id="respuesta" value="" placeholder="Respuesta" required>

        <label for="resultado">{{'Resultado'}}</label>
        <select class="form-control"  name="resultado" id="resultado" required>

            @if($valor==1)
                <option value="correcto">Correcto</option>
                <option value="incorrecto">Incorrecto</option>
            @endif
            @if($valor==0)
                <option value="incorrecto">Incorrecto</option>
            @endif



        </select>

        <label for="idPregunta">{{'Id Pregunta'}}</label>
        <input class="form-control" type="number" min="1" step="1" name="idPregunta" id="idPregunta" value="{{$idPregunta}}" required readonly >
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection
