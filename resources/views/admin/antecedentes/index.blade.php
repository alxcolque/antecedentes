@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>Antecedentes</h1>
    <button type="button" class="btn btn-success">Importar</button>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Caso</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
            </table>

        

        </div>
    </div>
    
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop