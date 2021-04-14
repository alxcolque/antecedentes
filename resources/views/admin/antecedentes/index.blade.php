@extends('adminlte::page')

@section('title', 'FELCC')
@section('plugins.Sweetalert2', true)

@section('content_header')
<h1>Antecedentes</h1>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-file-import"></i> Importar</button>
<button type="button" class="btn btn-dark"><i class="fas fa-plus"></i> Nuevo registro</button>
<div class="px-1 px-sm-5 mx-auto">
    <form autocomplete="off">
        <div class="container flex-row d-flex justify-content-center">
            <div class="col-lg-6 col-11 px-1">
                <div class="input-group input-daterange"> <input type="text" id="start" class="form-control text-left mr-2"> <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start Date</label> <span class="fa fa-calendar" id="fa-1"></span> <input type="text" id="end" class="form-control text-left ml-2"> <label class="ml-3 form-control-placeholder" id="end-p" for="end">End Date</label> <span class="fa fa-calendar" id="fa-2"></span> </div>
            </div>
        </div>
    </form>
</div>
@stop

@section('content')

<!-- Tablas de antecedentes mas reciente -->
<div class="section">
    <div class="card">
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper">
                <div class="row">

                    <div class="col">
                        <a href="/csvexport" class="pull-right btn btn-secondary btn-sm"><i class="fas fa-file-csv"></i> Export CSV</a>
                        <a href="/excelexport" class="pull-right btn btn-success  btn-sm"><i class="fas fa-file-excel"></i> Export EXCEL</a>&nbsp;
                        <!-- <a href="/importfile" class="pull-right btn btn-success"><i class="fas fa-file-import"></i> Import</a> -->
                    </div>
                    <div class="btn-group btn-group-sm mt-auto ml-auto p-2 " aria-label="Basic example">
                        <button type="button" class="btn btn-outline-dark btn-sm">Ultima Importación</button>
                        <button type="button" class="btn btn-outline-dark btn-sm">Todo</button>
                        <button type="button" class="btn btn-outline-dark btn-sm">Por fecha</button>
                        <button type="button" class="btn btn-outline-dark btn-sm">Por año</button>

                    </div>
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
                            <tbody>
                                @foreach ($antecedents as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->localidad}}</td>
                                    <td>{{$row->unidad}}</td>
                                    <td>{{$row->arma}}</td>
                                    <td>{{$row->remitidoa}}</td>
                                    <td>{{$row->pertenencias}}</td>
                                </tr>
                                @endforeach
                            </tbody>

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
    </div>

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
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">

    

    @stop

    @section('js')
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.input-daterange').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                calendarWeeks: true,
                clearBtn: true,
                disableTouchKeyboard: true
            });

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
        });
    </script>
    <Script>
        /* Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        ) */
    </Script>

    @stop