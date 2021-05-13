@extends('adminlte::page')

@section('title', 'FELCC')
@section('plugins.Sweetalert2', true)

@section('content_header')
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- warning -->
@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey!</strong> {{session('warning')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- msg success -->
@if(session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hey!</strong> {{session('info')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <h4>Antecedentes <span class="text-secondary">{{$cant_ant}} registros</span></h4>
    <div class="mt-auto ml-auto p-2">
        <b id="ajustes" class="btn btn-secondary" title="Mas Ajustes" data-toggle="tooltip" data-html="true"><i class="fas fa-cogs"></i></b>
    </div>
</div>

<div class="row">
    <div class="">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-file-import" title="Importa un archivo excel desde tu computador" data-toggle="tooltip" data-html="true"></i> Importar</button>
        <a href="{{route('admin.antecedentes.create')}}" class="btn btn-dark" title="Registrar un antecedente" data-toggle="tooltip" data-html="true"><i class="fas fa-plus"></i> Nuevo registro</a>

    </div>
    <div class="mt-auto ml-auto p-2">
        <!-- <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div> -->
        <!-- <div class="ui-widget">
            <label for="tags">Por Año: </label>
            <input id="intLimitTextBox">
        </div> -->
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
                        <!-- <a href="csvexport" class="btn btn-secondary btn-sm" title="Descargar el archivo en formato CSV" data-toggle="tooltip" data-html="true"><i class="fas fa-file-csv"></i> Export CSV</a> -->
                        <!-- <a href="file-export" class="btn btn-success  btn-sm" title="Descargar el archivo en formato EXCEL" data-toggle="tooltip" data-html="true"><i class="fas fa-file-excel"></i> Export EXCEL</a>&nbsp; -->
                        <!-- <a href="/importfile" class="pull-right btn btn-success"><i class="fas fa-file-import"></i> Import</a> -->
                    </div>
                    <div class="btn-group btn-group-sm mt-auto ml-auto p-2 " aria-label="Basic example">
                        <button type="button" class="btn btn-outline-dark btn-sm btn-show-import-ultimate" title="Ver todos los datos de la última importacion" data-toggle="tooltip" data-html="true">Ultima Importación</button>
                        <button type="button" class="btn btn-outline-dark btn-sm btn-all" title="Mostrar todos los registros de antecedentes" data-toggle="tooltip" data-html="true">Todo</button>
                        <button type="button" id="fitroPorFecha" class="btn btn-outline-dark btn-sm" title="Filtro de dato por fecha" data-toggle="tooltip" data-html="true">Por fecha</button>
                        <button type="button" id="filtroYear" class="btn btn-outline-dark btn-sm" title="Filtro por año" data-toggle="tooltip" data-html="true">Por año</button>

                    </div>
                    <div class="col-sm-12">
                        <table id="antecedentes" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th title="Identificador del antecedente" data-toggle="tooltip" data-html="true">No</th>
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
                    <input type="file" name="import_file" accept=".xls, .xlsx" required>
                    <button class="btn btn-primary">Importar arvhivo</button>
                </form>


            </div>
        </div>
    </div>
</div>

<!-- Filtro por FECHA -->
<div class="modal fade" id="modalFecha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleMod">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <input type="text" name="fechainicio" id="fechainicio" hidden>
                    <input type="text" name="fechafin" id="fechafin" hidden>
                    <br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-date"><i class="fas fa-search"></i> Buscar</button>


                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- Filtro por año -->
<div class="modal fade" id="modalYear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf

                    <div class="ui-widget">
                        <label for="tags">Por Año: </label>
                        <input id="gestion" name="gestionn" value="2021" class="awesomplete form-control" placeholder="2021" autocomplete="off" data-list="1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020,2021" data-minChars="1" required>
                    </div>
                    <br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-year"><i class="fas fa-search"></i> Buscar</button>

                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- Ajustes -->
<div class="modal fade" id="modalAjuste" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="#" onclick="return confirm('¿Estas loco seguro que quieres eliminar todos los antecedentes?')" class="btn btn-danger btn-ajuste" title="Eliminar todos los antecedentes de la base de datos" data-toggle="tooltip" data-html="true"><i class="fas fa-database "></i> <i class="fas fa-times"></i></a>
            </div>
            <div class="modal-footer">

            </div>
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
<link rel="stylesheet" href="/css/awesomplete.base.css">
<link rel="stylesheet" href="/css/awesomplete.theme.css">


@stop

@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="/js/daterangepicker.js"></script>
<script type="text/javascript" src="/js/awesomplete.min.js"></script>
<!-- Para generar pdf excel y csv -->
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />

<!-- Para generar pdf excel y csv -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->

<script>
    $(".btn-group > .btn").click(function() {
        $(".btn-group > .btn").removeClass("active");
        $(this).addClass("active");
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //var url = '';
    $(document).ready(function() {
        var url = "{{ route('antecedentestable') }}";
        mytable(url, 'get');
    });

    $('#fitroPorFecha').click(function() {

        $('#titleMod').html("Filtro por fecha");
        $('#modalFecha').modal('show');
    });
    $('#filtroYear').click(function() {

        $('.modal-title').html("Filtro por Año");
        $('#modalYear').modal('show');

    });

    $(".btn-year").click(function(e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var gestion = $("#gestion").val();
        var url = "{{route('filterbyyear')}}";
        $('#modalYear').modal('hide');
        mytable(url, 'post');
    });
    $(".btn-date").click(function(e) {
        e.preventDefault();
        var url = "{{route('filterbydate')}}";
        $('#modalFecha').modal('hide');
        mytable(url, 'post');
    });
    $(".btn-all").click(function(e) {
        e.preventDefault();
        var url = "{{route('filterall')}}";
        mytable(url, 'get');
    });
    //btn-show-import-ultimate
    $(".btn-show-import-ultimate").click(function(e) {
        e.preventDefault();
        var url = "{{route('filterultimateimport')}}";
        mytable(url, 'get');
    });

    function mytable(url, type) {
        //Tablas
        /*$.ajax({
              url: url,
              type: type,
              data: {
                  id:2012
              },
              cache: false,
              success: function(responseOutput){
                  console.log(responseOutput)
                  
              }
          });*/
        var table = $('#antecedentes').DataTable({
            processing: true,
            //serverSide: true,
            responsive: true,
            autoWidth: false,
            destroy: true,
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
            },

            "ajax": {
                "url": url,
                type: type,
                data: {
                    id: $('#gestion').val(),
                    date1: $('#fechainicio').val(),
                    date2: $('#fechafin').val(),
                },
                cache: false,

            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'detalle',
                    name: 'detalle',
                    orderable: false
                },
                {
                    data: 'arrestado',
                    name: 'arrestado'
                },
                {
                    data: 'ci',
                    name: 'ci'
                },
                {
                    data: 'nacido',
                    name: 'nacido'
                },
                {
                    data: 'nacionalidad',
                    name: 'nacionalidad'
                },
                {
                    data: 'edad',
                    name: 'edad'
                }, {
                    data: 'genero',
                    name: 'genero'
                },
                {
                    data: 'gestion',
                    name: 'gestion'
                }, {
                    data: 'fechahecho',
                    name: 'fechahecho'
                }, {
                    data: 'hora',
                    name: 'hora'
                }, {
                    data: 'mesregistro',
                    name: 'mesregistro'
                }, {
                    data: 'departamento',
                    name: 'departamento'
                },
                {
                    data: 'provincia',
                    name: 'provincia'
                },
                {
                    data: 'municipio',
                    name: 'municipio'
                },
                {
                    data: 'localidad',
                    name: 'localidad'
                }, {
                    data: 'zonabarrio',
                    name: 'zonabarrio'
                }, {
                    data: 'lugarhecho',
                    name: 'lugarhecho'
                }, {
                    data: 'temperancia',
                    name: 'temperancia'
                }, {
                    data: 'gps',
                    name: 'gps'
                }, {
                    data: 'causaarresto',
                    name: 'causaarresto'
                }, {
                    data: 'nathecho',
                    name: 'nathecho'
                }, {
                    data: 'unidad',
                    name: 'unidad'
                }, {
                    data: 'arma',
                    name: 'arma'
                }, {
                    data: 'remitidoa',
                    name: 'remitidoa'
                }, {
                    data: 'pertenencias',
                    name: 'pertenencias'
                }, {
                    data: 'nombres',
                    name: 'nombres'
                },

            ],
            order: [
                [0, 'desc']
            ]
        });
        new $.fn.dataTable.Buttons(table, {
            buttons: [{
                    extend: 'pdfHtml5',
                    text: 'Abrir en PDF',
                    download: 'open',
                    className: 'btn-danger',
                    messageTop: 'Copia de seguridad de Antecedentes',
                    title: 'Antecedentes',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [0, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26]
                    },
                    customize: function(doc) {
                        doc.styles.title = {
                            color: 'red',
                            fontSize: '40',
                            alignment: 'center'
                        }
                        doc.styles['td:nth-child(2)'] = {
                            width: '100px',
                            'max-width': '100px'
                        }
                    }
                },
                {
                    extend: 'excel',
                    title: 'Informacion en EXCEL',
                    filename: 'Antecedentes'
                }
            ],

        });

        table.buttons(0, null).container().appendTo(
            table.table().container()
        );
    }
    $('#ajustes').click(function() {

        $('.modal-title').html("Ajustes");
        $('#modalAjuste').modal('show');

    });
    $(".btn-ajuste").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{route('deleteallantecedents')}}",
            type: 'GET',
            success: function(responseOutput) {
                $('#modalAjuste').modal('hide');
                location.reload(true);
                //mytable("{{ route('antecedentestable') }}", 'GET');
            }
        });
        /*var url = "{{route('filterall')}}";
        $('#modalYear').modal('hide');
        mytable(url, 'post');*/
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
            $('#fechainicio').val(start.format('MM/DD/YYYY'));
            $('#fechafin').val(end.format('MM/DD/YYYY'));
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

    setInputFilter(document.getElementById("gestion"), function(value) {
        const tiempoTranscurrido = Date.now();
        const hoy = new Date(tiempoTranscurrido);
        const anoActual = hoy.getFullYear();
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= anoActual);
    });
</script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@stop