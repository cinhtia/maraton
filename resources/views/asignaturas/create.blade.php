@extends('layouts.app')

@section('title', 'Bienvenido a maratón')

@section('body-class', 'landing-page')

@section('styles')
    <style type="text/css">
        .team .row .col-md-4
        {
            margin-bottom: 3em;
        }
        .row {
            display: flex;
            display: -webkit-flex;
            flex-wrap: wrap;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="css/typeahead.css">

@endsection

@section('content')

    <h2 align="center"> Asignaturas </h2>

<form class="form-group" action="{{url('/asignaturas')}}" method="post">
    {{csrf_field()}}

    <label for="nombreAsignatura">{{'Nombre de la asignatura'}}</label>
    <input class="form-control" type="text" name="nombreAsignatura" id="nombreAsignatura" value="" placeholder="Nombre de la asignatura" required>

    <label for="numUnidades">{{'Numero de unidades'}}</label>
    <input class="form-control" type="number" min="1" step="1" name="numUnidades" id="numUnidades" value="" placeholder="Numero de unidades" required >
    <br>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
@section('scripts')
    <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>

    <script>
        $(function(){
            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: '{{ url("products/json")}}'
            });

            //inicializamos typeahead sobre el input de búsqueda
            $('#search').typeahead({
                hint: true,
                hightlight: true, //resultados en negrita
                minLenght: 1 //mostrar resultados a partir de un caracter
            }, {
                name: 'products',
                source: products

            })
        });
    </script>
@endsection
