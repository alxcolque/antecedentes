@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Previo para guardar en la base de datos</h1>
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hey!</strong> {{session('info')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


@stop

@section('content')
<div class="content-fluid">
    <div class="row">
        <div class="col-4" title="Conteo de registros antes de guadar en la base de datos" data-toggle="tooltip" data-html="true">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$cantidad}}</h3>
                    <p><span>Registros importados desde excel</span></p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-excel"></i>
                </div>
            </div>
        </div>
        <div class="col-4" title="Conteo de registros antes de guadar en la base de datos" data-toggle="tooltip" data-html="true">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$cantidad1}}</h3>
                    <p><span>Registros desde entidades autorizadas</span></p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <!-- <a href="/csvexport" class="pull-right btn btn-primary"><i class="fas fa-file-csv"></i> Export</a>
        <a href="/excelexport" class="pull-right btn btn-default"><i class="fas fa-file-excel"></i> Export</a>&nbsp;  -->

    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item" title="Improtacion excel" data-toggle="tooltip" data-html="true"><a class="nav-link active" href="#activity" data-toggle="tab">Desde Excel</a></li>

                    <li class="nav-item" title="Datos desde el exterior" data-toggle="tooltip" data-html="true"><a class="nav-link" href="#settings" data-toggle="tab">Desde Usuario Moderador</a></li>
                </ul>
            </div><!-- /.card-header -->

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="row">

                            <div class="ml-auto p-2">
                                <div class="">
                                    <a href="registrarimport" onclick="
return confirm('¿Seguro que quiere importar en la base de datos?')" class="btn btn-dark" data-toggle="tooltip" data-html="true" title="Clic para insertar en la base de datos"><i class="fas fa-database"></i> Guardar En la base datos</a>
                                    <a href="deleterecord" onclick="
return confirm('¿Seguro que quiere eliminar todo este registro?')" class="btn btn-danger" data-toggle="tooltip" data-html="true" title="Boton para limpiar la tabla"><i class="fas fa-trash"></i> Limpiar tabla</a>
                                </div>


                            </div>
                        </div>

                        <table id="antecedentes" class="table-striped table-bordered" style="width:100%">
                            <thead>
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
                            </thead>
                            @foreach ($records as $record)
                            @if($record->tiporegistro === "1")
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
                                @endif
                                @endforeach

                        </table>

                    </div>


                    <div class="tab-pane" id="settings">
                        <div class="row">

                            <div class="ml-auto p-2">
                                <div class="">
                                    <a href="registrarimport" onclick="
return confirm('¿Seguro que quiere importar en la base de datos?')" class="btn btn-info" data-toggle="tooltip" data-html="true" title="Clic para insertar en la base de datos"><i class="fas fa-database"></i> Guardar En la base datos</a>
                                    <a href="deleterecord" onclick="
return confirm('¿Seguro que quiere eliminar todo este registro?')" class="btn btn-danger" data-toggle="tooltip" data-html="true" title="Boton para limpiar la tabla"><i class="fas fa-trash"></i> Limpiar tabla</a>
                                </div>


                            </div>
                        </div>
                        <table id="antecedentes1" class="table-striped table-bordered" style="width:100%">
                            <thead>
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
                            </thead>
                            @foreach ($records as $record)
                            @if($record->tiporegistro === "2")
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
                                @endif
                                @endforeach

                        </table>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


</div>


@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

@stop

@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.queryloader2/3.2.2/jquery.queryloader2.min.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    $(document).ready(function() {
        //Tablas
        $('#antecedentes').DataTable({
            processing: true,
            //serverSide: true,
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar " +
                    '<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="-1">All</option></select>' +
                    " registros por página",
                "zeroRecords": "No existe registros - discupa",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
        //Tablas2
        $('#antecedentes1').DataTable({
            processing: true,
            //serverSide: true,
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar " +
                    '<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="-1">All</option></select>' +
                    " registros por página",
                "zeroRecords": "No existe registros - discupa",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
<script>
    $("body").queryLoader2({
        barColor: "#555566",
        backgroundColor: "#fff",
        percentage: true,
        barHeight: 1,
        completeAnimation: "grow",
        minimumTime: 100,
        onLoadComplete: hidePreLoader
    });

    function hidePreLoader() {
        $("#precarga").hide();
    }
</script>
@stop