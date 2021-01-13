@extends('layouts.app')

@section('content')

    <h2 align="center"> Unidades </h2>

    <form class="form-group" action="{{url('/unidades/'.$idAsignatura.'')}}" method="post">
        {{csrf_field()}}
        <label for="nombreUnidad">{{'Nombre de la unidad'}}</label>
        <input class="form-control" type="text" name="nombreUnidad" id="nombreUnidad" value="" placeholder="Nombre de la unidad" required>

        <label for="numUnidad">{{'Numero de unidad'}}</label>
        <input class="form-control" type="number" min="1" step="1" name="numUnidad" id="numUnidad" value="" placeholder="Numero de unidades" required >

        <label for="idAsignatura">{{'Id asignatura'}}</label>
        <input class="form-control" type="number" min="1" step="1" name="idAsignatura" id="idAsignatura" value="{{$idAsignatura}}" placeholder="idAsignatura" required readonly >
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection
