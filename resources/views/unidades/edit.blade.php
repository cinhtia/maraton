@extends('layouts.app')

@section('content')

    <h2 align="center"> Unidades </h2>

    <form class="form-group" method="POST" action="{{ route('unidades.update', $unidad->id) }}">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <label for="nombreUnidad">{{'Nombre de la unidad'}}</label>
        <input class="form-control" type="text" name="nombreUnidad" id="nombreUnidad" value="{{$unidad->nombreUnidad}}" placeholder="Nombre de la unidad" required>

        <label for="numUnidad">{{'Numero de unidad'}}</label>
        <input class="form-control" type="number" min="1" step="1" name="numUnidad" id="numUnidad" value="{{$unidad->numUnidad}}" placeholder="Numero de unidades" required >

        <label for="idAsignatura">{{'Id asignatura'}}</label>
        <input class="form-control" type="number" min="1" step="1" name="idAsignatura" id="idAsignatura" value="{{$unidad->idAsignatura}}" placeholder="idAsignatura" required >
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection
