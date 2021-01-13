@extends('layouts.app')
@section('content')

    <h2 align="center">{{$asignature->nombreAsignatura}}</h2>
    <br>
    <h2 align="center">{{$unidad->nombreUnidad}}</h2>

    <table class="table" >
        <thead>
        <th>Nombre de la unidad</th>
        <th>Pregunta</th>
        <th>Dificultad</th>

        <th> <a href="/preguntas/create/{{$unidad->id}}"> <button type="button" class="btn btn-primary">Nuevo</button> </a> </th>
        </thead>
        @foreach($find as $pregunta)
            <tr>
                <td>{{$pregunta->idUnidad}}</td>
                <td>{{$pregunta->pregunta}}</td>
                <td>{{$pregunta->dificultad}}</td>

                <td><a href="/respuestas/{{$pregunta->id}}"> <button type="button" class="btn btn-warning">Respuestas</button> </a></td>
                <td>
                    <a href="/preguntas/{{$pregunta->id}}/edit"> <button type="button" class="btn btn-info">Editar</button> </a> </td>
                <td>
                    <form action="{{url('/pregunta/'.$pregunta->id.'/'.$unidad->idUnidad.'') }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

                    </form>
                </td>



            </tr>
        @endforeach
    </table>


@endsection
