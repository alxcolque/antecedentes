@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')
<p>Antecedentes más recientes.</p>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Lista</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <table id="antecedentes" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Localidad</th>
                                <th>Unidad</th>
                                <th>Arma</th>
                                <th>Remitido a date</th>
                                <th>Pertenencias</th>
                            </tr>
                        </thead>
                        
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Localidad</th>
                                <th>Unidad</th>
                                <th>Arma</th>
                                <th>Remitido a date</th>
                                <th>Pertenencias</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#antecedentes').DataTable({
            processing: true,
            serverSide: true,
            "ajax": "{{route('tableantecedentes')}}",
            "columns": [{
                    data: 'id'
                },
                {
                    data: 'localidad'
                },
                {
                    data: 'unidad'
                },
                {
                    data: 'arma'
                },
                {
                    data: 'remitidoa'
                },
                {
                    data: 'pertenencias'
                }
            ],

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