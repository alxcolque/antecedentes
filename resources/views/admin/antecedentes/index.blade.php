@extends('adminlte::page')

@section('title', 'FELCC')
@section('plugins.Sweetalert2', true)

@section('content_header')
<h1>Antecedentes</h1>
<div class="row">
    <div class="">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-file-import"></i> Importar</button>
        <button type="button" class="btn btn-dark"><i class="fas fa-plus"></i> Nuevo registro</button>

    </div>
    <div class="mt-auto ml-auto p-2">
        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
        <div class="ui-widget">
            <label for="tags">Por Año: </label>
            <input id="intLimitTextBox">
        </div>
    </div>

</div>


@stop

@section('content')

<!-- Tablas de antecedentes mas reciente -->
<div class="section">
    <div class="card">
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper">
                <div class="row">

                    <div class="">
                        <a href="/csvexport" class="btn btn-secondary btn-sm"><i class="fas fa-file-csv"></i> Export CSV</a>
                        <a href="/excelexport" class="btn btn-success  btn-sm"><i class="fas fa-file-excel"></i> Export EXCEL</a>&nbsp;
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
                                    <th>No</th>
                                    <th>Detalle</th>
                                    <th>Nombre</th>
                                    <th>CI</th>
                                    <th>Nacido en</th>
                                    <th>Nacionalidad</th>
                                    <th>Edad</th>
                                    <th>Genero</th>
                                    <!-- Acont -->
                                    <th>Gestión</th>
                                    <th>Fecha Hecho</th>
                                    <th>Hora</th>
                                    <th>Mes registro</th>
                                    <th>Departamento</th>
                                    <th>Povincia</th>
                                    <th>Municipio</th>
                                    <th>Localidad</th>
                                    <th>Zona Barrio</th>
                                    <th>Lugar Hecho</th>
                                    <th>Temperancia</th>
                                    <th>GPS</th>
                                    <th>Causa Arresto</th>
                                    <th>Naturaleza</th>
                                    <th>Unidad</th>
                                    <th>Arma</th>
                                    <th>Remitido a:</th>
                                    <th>Pertenencias</th>
                                    <th>Acción Directa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($antecedents as $antecedent)
                                <tr>
                                    <td>{{$antecedent->id}}</td>
                                    <td>
                                        <a href="{{route('admin.antecedentes.show', $antecedent->id)}}" id="" class="delete btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>

                                    <td>{{$antecedent->people[0]->arrestado}}</td>
                                    <td>{{$antecedent->people[0]->ci}}</td>
                                    <td>{{$antecedent->people[0]->nacido}}</td>
                                    <td>{{$antecedent->people[0]->nacionalidad}}</td>
                                    <td>{{$antecedent->people[0]->edad}}</td>
                                    <td>{{$antecedent->people[0]->genero}}</td>

                                    <td>{{$antecedent->gestion}}</td>
                                    <td>{{$antecedent->fechahecho}}</td>
                                    <td>{{$antecedent->hora}}</td>
                                    <td>{{$antecedent->mesregistro}}</td>
                                    <td>{{$antecedent->province->department->departamento}}</td>
                                    <td>{{$antecedent->province->provincia}}</td>
                                    <td>{{$antecedent->municipio}}</td>

                                    <td>{{$antecedent->localidad }}</td>
                                    <td>{{$antecedent->zonabarrio}}</td>
                                    <td>{{$antecedent->lugarhecho}}</td>
                                    <td>{{$antecedent->temperancia}}</td>
                                    <td>{{$antecedent->gps}}</td>
                                    <td>{{$antecedent->crime->causaarresto}}</td>
                                    
                                    <td>{{$antecedent->nathecho}}</td>
                                    <td>{{$antecedent->unidad}}</td>
                                    <td>{{$antecedent->arma}}</td>
                                    <td>{{$antecedent->remitidoa}}</td>
                                    <td>{{$antecedent->pertenencias}}</td>
                                    <td>{{$antecedent->detective->nombres}}</td>
                                </tr>
                                @endforeach
                            </tbody>

                            <!-- <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Detalle</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Localidad</th>
                                    <th>Unidad</th>
                                    <th>Arma</th>
                                    <th>Remitido a date</th>
                                    <th>Pertenencias</th>
                                </tr>
                            </tfoot> -->
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
    <link rel="stylesheet" href="/css/daterangepicker.css">
    <!-- <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css"> -->



    @stop

    @section('js')
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="/js/daterangepicker.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
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
        });
    </script>
    <Script>
        /* Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        ) */
    </Script>
    <script>
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Hoy dia': [moment(), moment()],
                    'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
                    'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
                    'Este mes': [moment().startOf('month'), moment().endOf('month')],
                    'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });
    </script>
    <script>
        // Restricts input for the given textbox to the given inputFilter.
        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            });
        }

        setInputFilter(document.getElementById("intLimitTextBox"), function(value) {
            return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 500);
        });
        $(function() {

            const tiempoTranscurrido = Date.now();
            const hoy = new Date(tiempoTranscurrido);
            const anoActual = hoy.getFullYear();
            console.log(anoActual); //2020

            var availableTags = [];
            var TagString = [];
            var year = anoActual
            for (i = 0; i <= 70; i++) {
                availableTags[i] = year--;
                TagString[i] = availableTags[i].toString();
            }
            $("#intLimitTextBox").autocomplete({
                source: TagString
            });
        });
    </script>
    @stop