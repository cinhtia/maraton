@extends('layouts.app')

@section('title', 'Bienvenido a maratón')

@section('body-class', 'landing-page')

@section('content')

    <h2 align="center"> Preguntas </h2>

    <form class="form-group" action="{{url('/preguntas/'.$idUnidad.'')}}" method="post">
        {{csrf_field()}}
        <label for="pregunta">{{'Pregunta'}}</label>
        <input class="form-control" type="text" name="pregunta" id="pregunta" value="" placeholder="Pregunta" required>

        <label for="dificultad">{{'Dificultad'}}</label>
        <select class="form-control"  name="dificultad" id="dificultad" required>
            <option value="1">Facil</option>
            <option value="2">Medio</option>
            <option value="3">Dificil</option>
        </select>


        <label for="idUnidad">{{'Id Unidad'}}</label>
        <input class="form-control" type="number" min="1" step="1" name="idUnidad" id="idUnidad" value="{{$idUnidad}}" required readonly >
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

