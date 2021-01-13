
@extends('layouts.app')
@section('content')

    <h2 align="center">{{$asignature->nombreAsignatura}}</h2>

    <table class="table" >
        <thead>
        <th>Unidad</th>
        <th>Nombre de la unidad</th>

        <th> <a href="/unidades/create/{{$asignature->id}}"> <button type="button" class="btn btn-primary">Nuevo</button> </a> </th>
        </thead>
        @foreach($find as $unidad)
            <tr>
                <td>{{$unidad->numUnidad}}</td>
                <td>{{$unidad->nombreUnidad}}</td>
                <td><a href="/preguntas/{{$unidad->id}}"> <button type="button" class="btn btn-warning">Preguntas</button> </a></td>
                <td>
                    <a href="/unidades/{{$unidad->id}}/edit"> <button type="button" class="btn btn-info">Editar</button> </a> </td>
                <td>
                    <form action="{{url('/unidades/'.$unidad->id.'/'.$unidad->idAsignatura.'') }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

                    </form>
                </td>



            </tr>
        @endforeach
    </table>


@endsection
