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

    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #C5CAE9 !important;
            background-repeat: no-repeat;
            padding: 0 !important
        }

        .container {
            padding-top: 120px;
            padding-bottom: 120px
        }

        input {
            padding: 22px 15px !important;
            border: 1px solid #CFD8DC !important;
            border-radius: 4px !important;
            box-sizing: border-box;
            background-color: #fff !important;
            color: #000 !important;
            font-size: 16px !important;
            letter-spacing: 1px;
            position: relative
        }

        input:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #1976D2 !important;
            outline-width: 0
        }

        .fa-calendar {
            position: absolute;
            top: 13px;
            font-size: 20px;
            color: #1976D2;
            z-index: 1000
        }

        #fa-1 {
            left: calc(50% - 40px)
        }

        #fa-2 {
            left: calc(100% - 40px)
        }

        .form-control-placeholder {
            position: absolute;
            top: -10px !important;
            padding: 12px 2px 0 2px;
            opacity: 0.5
        }

        #end-p {
            left: calc(50% + 4px)
        }

        .form-control:focus+.form-control-placeholder,
        .form-control:valid+.form-control-placeholder {
            font-size: 95%;
            top: 10px;
            transform: translate3d(0, -100%, 0);
            opacity: 1
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1
        }

        :-ms-input-placeholder {
            color: #BDBDBD
        }

        ::-ms-input-placeholder {
            color: #BDBDBD
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }

        .datepicker {
            background-color: #fff;
            border-radius: 0 !important;
            align-content: center !important;
            padding: 0 !important
        }

        .datepicker-dropdown {
            top: 180px !important;
            left: calc(50% - 173.5px) !important;
            border-right: #1976D2;
            border-left: #1976D2
        }

        .datepicker-dropdown.datepicker-orient-left:before {
            left: calc(50% - 6px) !important
        }

        .datepicker-dropdown.datepicker-orient-left:after {
            left: calc(50% - 5px) !important;
            border-bottom-color: #1976D2
        }

        .datepicker-dropdown.datepicker-orient-right:after {
            border-bottom-color: #1976D2
        }

        .datepicker table tr td.today,
        span.focused {
            border-radius: 50% !important;
            background-image: linear-gradient(#FFF3E0, #FFE0B2)
        }

        thead tr:nth-child(2) {
            background-color: #1976D2 !important
        }

        thead tr:nth-child(3) th {
            font-weight: bold !important;
            padding: 20px 10px !important;
            color: #BDBDBD !important
        }

        tbody tr td {
            padding: 10px !important
        }

        tfoot tr:nth-child(2) th {
            padding: 10px !important;
            border-top: 1px solid #CFD8DC !important
        }

        .cw {
            font-size: 14px !important;
            background-color: #E8EAF6 !important;
            border-radius: 0px !important;
            padding: 0px 20px !important;
            margin-right: 10px solid #fff !important
        }

        .old,
        .day,
        .new {
            width: 40px !important;
            height: 40px !important;
            border-radius: 0px !important
        }

        .day.old,
        .day.new {
            color: #E0E0E0 !important
        }

        .day.old:hover,
        .day.new:hover {
            border-radius: 50% !important
        }

        .old-day:hover,
        .day:hover,
        .new-day:hover,
        .month:hover,
        .year:hover,
        .decade:hover,
        .century:hover {
            border-radius: 50% !important;
            background-color: #eee
        }

        .active {
            border-radius: 50% !important;
            background-image: linear-gradient(#1976D2, #1976D2) !important;
            color: #fff !important
        }

        .range-start,
        .range-end {
            border-radius: 50% !important;
            background-image: linear-gradient(#1976D2, #1976D2) !important
        }

        .range {
            background-color: #E3F2FD !important
        }

        .prev,
        .next,
        .datepicker-switch {
            border-radius: 0 !important;
            padding: 10px 10px 10px 10px !important;
            font-size: 18px;
            opacity: 0.7;
            color: #fff
        }

        .prev:hover,
        .next:hover,
        .datepicker-switch:hover {
            background-color: inherit !important;
            opacity: 1
        }

        @media screen and (max-width: 726px) {
            .datepicker-dropdown.datepicker-orient-right:before {
                right: calc(50% - 6px)
            }

            .datepicker-dropdown.datepicker-orient-right:after {
                right: calc(50% - 5px)
            }
        }
    </style>

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