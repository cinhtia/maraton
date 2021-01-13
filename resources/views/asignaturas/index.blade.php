@extends('layouts.app')

@section('title', 'Bienvenido a maratón')

@section('body-class', 'landing-page')


@section('content')



    <table class="table" >
        <thead>
        <th>Nombre de la asignatura</th>
        <th>Numero de unidades</th>
        <th> <a href="/asignaturas/create"> <button type="button" class="btn btn-primary">Nuevo</button> </a> </th>
        </thead>
        @foreach($asignature as $asignature)
            <tr>
                <td>{{$asignature->nombreAsignatura}}</td>
                <td>{{$asignature->numUnidades}}</td>
                <td> <a href="/unidades/{{$asignature->id}}"> <button type="button" class="btn btn-warning">Unidades</button> </a></td>
                <td> <a href="/asignaturas/{{$asignature->id}}/edit"> <button type="button" class="btn btn-info">Editar</button> </a> </td>
                <td>
                    <form action="{{url('/asignaturas/'.$asignature->id) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>

                    </form>
                </td>



            </tr>
        @endforeach
    </table>


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
