@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Previo para guardar en la base de datos</h1>
@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success!</strong> {{ $message }}
</div>
@endif
{!! Session::forget('success') !!}

<button type="button" class="btn btn-dark">Guardar En la base datos</button>
@stop

@section('content')
<div class="section">
    <div class="card">
        <div class="row" style="padding: 0px 15px;"><a href="/csvexport" class="pull-right btn btn-primary"><i class="fas fa-file-csv"></i> Export</a><a href="/excelexport" class="pull-right btn btn-default"><i class="fas fa-file-excel"></i> Export</a>&nbsp; <a href="/importfile" class="pull-right btn btn-success"><i class="fas fa-file-import"></i> Import</a></div><br>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Gestion</th>
                <th>Fecha Hecho</th>
                <th>Hora</th>
                <th>Mes</th>
                <th>Deptartamento</th>
                <th>Provincia</th>
                <th>Municipio</th>
                <th>Localidad</th>
                <th>Zona Barrio</th>
                <th>Lugar Hecho</th>
                <th>GPS</th>
                <th>Unidad</th>
                <th>Arrestado</th>
                <th>CI</th>
                <th>Nacido</th>
                <th>Nacionalidad</th>
                <th>Edad</th>
                <th>Genero</th>
                <th>Temperancia</th>
                <th>CausaArresto</th>
                <th>Naturaleza</th>
                <th>Arma</th>
                <th>Remitido a</th>
                <th>P. Policial</th>
                <th>Pertenencias</th>
            </tr>
            @foreach ($records as $record)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $record->gestion }}</td>
                <td>{{ $record->fechahecho }}</td>
                <td>{{ $record->hora }}</td>
                <td>{{ $record->mesregistro }}</td>
                <td>{{ $record->departamento }}</td>
                <td>{{ $record->provincia }}</td>
                <td>{{ $record->municipio }}</td>
                <td>{{ $record->localidad }}</td>
                <td>{{ $record->zonabarrio }}</td>
                <td>{{ $record->lugarhecho }}</td>
                <td>{{ $record->gps }}</td>
                <td>{{ $record->unidad }}</td>
                <td>{{ $record->arrestado }}</td>
                <td>{{ $record->ci }}</td>
                <td>{{ $record->nacido }}</td>
                <td>{{ $record->nacionalidad }}</td>
                <td>{{ $record->edad }}</td>
                <td>{{ $record->genero }}</td>
                <td>{{ $record->temperancia }}</td>
                <td>{{ $record->causaarresto }}</td>
                <td>{{ $record->nathecho }}</td>
                <td>{{ $record->arma }}</td>
                <td>{{ $record->remitidoa }}</td>
                <td>{{ $record->nombres }}</td>
                <td>{{ $record->pertenencias }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    {!! $records->links() !!}

</div>

@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">

@stop

@section('js')

@stop