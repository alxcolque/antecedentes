@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h4>Acciones que ocurren en el Sistema</h4>
@stop

@section('content')
<!-- Tablas de antecedentes mas reciente -->
<div class="section">
    <div class="card">
        <div class="row" style="padding: 3px 15px;">
            <a href="/" class="pull-right btn btn-secondary btm-sm"><i class="fas fa-trash"></i> Limpiar todo las acciones</a>
            <!-- <a href="/importfile" class="pull-right btn btn-success"><i class="fas fa-file-import"></i> Import</a> -->
        </div><br>
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="mitable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Accion</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($actions as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->usuario}}</td>
                                    <td>{{$row->accion}}</td>
                                    <td>{{$row->fecha}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

@stop

@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#mitable').DataTable({
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
@stop