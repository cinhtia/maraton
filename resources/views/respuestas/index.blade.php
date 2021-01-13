@extends('layouts.app')
@section('content')

    <h2 align="center">Asignatura: {{$asignature->nombreAsignatura}}</h2>
    <br>
    <h2 align="center">Unidad: {{$unidad->nombreUnidad}}</h2>
    <br>
    <h2 align="center">Pregunta: {{$pregunta->pregunta}}</h2>

    <table class="table" >
        <thead>
        <th>Respuesta</th>
        <th>Estado</th>
        <th>Unidad</th>

        <th> <a href="/respuestas/create/{{$pregunta->id}}"> <button type="button" class="btn btn-primary">Nuevo</button> </a> </th>
        </thead>
        @foreach($find as $respuesta)
            <tr>
                <td>{{$respuesta->respuesta}}</td>
                <td>{{$respuesta->resultado}}</td>
                <td>{{$respuesta->idPregunta}}</td>
                 <td>
                    <a href="/respuestas/{{$respuesta->id}}/edit"> <button type="button" class="btn btn-info">Editar</button> </a> </td>
                <td>
                    <form action="{{url('/respuestas/'.$respuesta->id.'/'.$pregunta->id.'') }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

                    </form>
                </td>



            </tr>
        @endforeach
    </table>


@endsection
