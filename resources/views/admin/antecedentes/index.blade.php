@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Antecedentes</h1>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-file-import"></i> Importar</button>
<button type="button" class="btn btn-dark"><i class="fas fa-plus"></i>Nuevo registro</button>
@stop

@section('content')

<!-- Tablas de antecedentes mas reciente -->
<div class="section">
    <div class="card">
        <div class="row" style="padding: 0px 15px;">
        <a href="/csvexport" class="pull-right btn btn-secondary"><i class="fas fa-file-csv"></i> Export CSV</a>
        <a href="/excelexport" class="pull-right btn btn-success"><i class="fas fa-file-excel"></i> Export EXCEL</a>&nbsp; 
        <!-- <a href="/importfile" class="pull-right btn btn-success"><i class="fas fa-file-import"></i> Import</a> -->
        </div><br>
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
<!--Modal para importar-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">

                <br />
                <h2 class="text-title">Importar Excel</h2>

                <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('file-import') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="file" name="import_file" accept=".csv,.xlx, .xlsx" />
                    <button class="btn btn-primary">Importar arvhivo</button>
                </form>


            </div>
        </div>
    </div>

    @stop

    @section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
    <link rel="stylesheet" href="/css/app.css">

    @stop

    @section('js')

    @stop