@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')
<p>Antecedentes más recientes.</p>
<div class="card">
    <div class="row">

        <div class="col-4" id="contant" title="Conteo de registros antecedentes" data-toggle="tooltip" data-html="true">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$cant_ant}}</h3>
                    <p><span>Registro total de antecedentes</span></p>
                </div>
                <div class="icon">
                    <i class="fas fa-database"></i>
                </div>

            </div>
        </div>


        <div class="col-4" id="preant" title="Conteo de registros antes de guadar en la base de datos" data-toggle="tooltip" data-html="true">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$cant_preant}}</h3>
                    <p><span>Cantidad de pre-antecedentes </span></p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-4" id="contpol" title="Cantidad de personal policial que intervinieron en algún antecedente" data-toggle="tooltip" data-html="true">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$cant_pol}}</h3>
                    <p><span>Cantidad total de personal policia</span></p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Seccion de busqueda -->

    <div class="col-md-12">
        <div class="card bg-secondary">

            <div class="card-header p-2">
                <h5>Consulta antecedente</h5>
            </div><!-- /.card-header -->

            <div class="card-body">

                <form action="{{route('admin.resultado')}}" method="get">
                    <div class="input-group mb-3 col-sm-10">

                        <input type="text" name="text" id="search" class="form-control form-control-lg" placeholder="Escriba un nombre aquí para encontrar un antecedente (ej. Juan)" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit" id="button-addon2"> <i class="fa fa-search"></i> Buscar</button>

                            <a href="{{url('home')}}" class="btn btn-outline-danger"><i class="fa fa-retweet"></i> Limpiar tabla</a>
                        </div>
                    </div>
                </form>

                @if(count($antecedents) <= 0) <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong></strong> Encontrar un antecedente escribiendo el nombre de la persona en la caja de búsqueda
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    @else

                    <table id="antecedentes1" class="table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Detalle</th>
                                <th>Arrestado</th>
                                <th>CI</th>
                                <th>Foto</th>
                                <th>Nacido</th>
                                <th>Nacionalidad</th>
                                <th>Edad</th>
                                <th>Genero</th>
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

                                <th>Temperancia</th>
                                <th>CausaArresto</th>
                                <th>Naturaleza</th>
                                <th>Arma</th>
                                <th>Remitido a</th>
                                <th>P. Policial</th>
                                <th>Pertenencias</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($antecedents as $record)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    <button onclick="verdetalle('{{$record->id}}','{{ $record->arrestado }}','{{ $record->ci }}','{{ $record->foto }}','{{ $record->nacido }}','{{ $record->nacionalidad }}','{{ $record->edad }}','{{ $record->genero }}','{{ $record->gestion }}','{{ $record->fechahecho }}','{{ $record->hora }}','{{ $record->mesregistro }}','{{ $record->departamento }}','{{ $record->provincia }}','{{ $record->municipio }}','{{ $record->localidad }}','{{ $record->zonabarrio }}','{{ $record->lugarhecho }}','{{ $record->gps }}','{{ $record->unidad }}','{{ $record->temperancia }}','{{ $record->causaarresto }}','{{ $record->nathecho }}','{{ $record->arma }}','{{ $record->remitidoa }}','{{ $record->nombres }}','{{ $record->pertenencias}}')" class="btn btn-info  btn-sm" data-toggle="tooltip" data-html="true" title="Ver mas"><i class="fa fa-eye"></i> Ver más...</button>
                                </td>

                                <td>{{ $record->arrestado }}</td>
                                <td>{{ $record->ci }}</td>
                                <td>{{ $record->foto }}</td>
                                <td>{{ $record->nacido }}</td>
                                <td>{{ $record->nacionalidad }}</td>
                                <td>{{ $record->edad }}</td>
                                <td>{{ $record->genero }}</td>

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

                                <td>{{ $record->temperancia }}</td>
                                <td>{{ $record->causaarresto }}</td>
                                <td>{{ $record->nathecho }}</td>
                                <td>{{ $record->arma }}</td>
                                <td>{{ $record->remitidoa }}</td>
                                <td>{{ $record->nombres }}</td>
                                <td>{{ $record->pertenencias }}</td>


                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    @endif
            </div>
        </div><!-- /.card-body -->


    </div>
    <div class="col-md-13">

        <div class="card">
            <div class="card-header">
                <h5>Estadística de antecedentes</h5>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="offset-md-2">
                        <select name="year" id="year" class="form-control">
                            <option value="">Seleccione año . . .</option>
                            @foreach($year_list as $row)
                            <option value="{{$row->gestion}}">{{$row->gestion}}</option>
                            @endforeach
                            <!-- <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option> -->
                        </select>
                    </div>
                </div>
                <div style="margin-top: 10px;">
                </div>
                <div class="panel-body">
                    <div id="chart_div" style="width: 100%; height: 600px;"></div>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- Fin contenido -->
<div id="modalverdetalle" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalle del antecedente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body" id="content">
                            <div class="text-center" title="Foto de la persona" data-toggle="tooltip" data-html="true">
                                <img id="idimag" class="rounded-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" height="100" alt="punto jotapege">
                            </div>
                            <li class="list-group-item">
                                <b>Nombre: </b> <a class="float-right" id="arrestado">ALEX</a>
                            </li>
                            <p><b>Ci: </b><span id="ci"></span></p>
                            <p><b>Genero: </b><span id="genero"></span></p>
                            <p><b>Gestion: </b><span id="gestion"></span></p>
                            <p><b>Fecha del hecho: </b><span id="fechahecho"></span></p>
                            <p><b>Hora del hecho: </b><span id="hora"></span></p>
                            <p><b>Mes de registro: </b><span id="mesregistro"></span></p>
                            <p><b>Departamento: </b><span id="departamento"></span></p>
                            <p><b>Provincia: </b><span id="provincia"></span></p>
                            <p><b>Municipio: </b><span id="municipio"></span></p>
                            <p><b>Localidad: </b><span id="localidad"></span></p>
                            <p><b>Zona o Barrio: </b><span id="zonabarrio"></span></p>
                            <p><b>Lugar del hecho: </b><span id="lugarhecho"></span></p>

                            <p><b>GPS: </b><span id="gps"></span></p>
                            <p><b>Unidad: </b><span id="unidad"></span></p>
                            <p><b>Tempeancia: </b><span id="temperancia"></span></p>
                            <p><b>Causa del arresto: </b><span id="causaarresto"></span></p>
                            <p><b>Naturaleza del hecho: </b><span id="nathecho"></span></p>
                            <p><b>Arma: </b><span id="arma"></span></p>
                            <p><b>Remitido: </b><span id="remitidoa"></span></p>
                            <p><b>Nombres: </b><span id="nombres"></span></p>
                            <p><b>Pertenencias: </b><span id="pertenencias"></span></p>


                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="container-fluid h-100">
                                <div class="row w-100 align-items-center">
                                    <div class="col text-center">
                                        <button id="cmd" class="btn btn-danger" title="Clic para para descargar en PDF este registro" data-toggle="tooltip" data-html="true"><b>Descargar en pdf</b></button>
                                        <input class="btn btn-primary" type='button' id='btn' value='Imprimir' onclick="printDiv('content')" title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-default" href="{{url('home')}}">Cerrar</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('/css/jquery-ui.min.css')}}">
<!-- sdfasefa -->
<style>
    /* Ensure that the demo table scrolls */
    th,
    td {
        white-space: nowrap;
    }

    div.dataTables_wrapper {
        margin: 0 auto;
    }

    div.container {
        width: 80%;
    }
</style>
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<!-- Graficos -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    $('#contant').click(function() {
        $(location).attr('href', '{{route("admin.antecedentes.index")}}');
    });
    $('#preant').click(function() {
        $(location).attr('href', '{{url("/admin/import")}}');
    });
    $('#contpol').click(function() {
        $(location).attr('href', '{{route("admin.detectives.index")}}');
    });
</script>
<script>
    //var cursos = ['html', 'php', 'python'];
    $('#search').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('admin.search')}}",
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function(data) {
                    response(data)
                }
            });
        }
    });
</script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#cmd': function(element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function() {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('antecedente.pdf');
    });
    /* Imprimir */
    function printDiv2() {
        var divToPrint = document.getElementById('content');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
        newWin.document.close();
        setTimeout(function() {
            newWin.close();
        }, 10);
    }

    function printDiv(nombreDiv) {
        var contenido = document.getElementById(nombreDiv).innerHTML;
        var contenidoOriginal = document.body.innerHTML;
        document.body.innerHTML = contenido;
        window.print();
        document.body.innerHTML = contenidoOriginal;
    }
</script>
<script>
    $(document).ready(function() {
        //Tablas
        var table = $('#example').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            columnDefs: [{
                width: '20%',
                targets: 0
            }],
            fixedColumns: true
        });
        //Tablas2
        $('#antecedentes1').DataTable({
            processing: true,
            //serverSide: true,
            //responsive: true,
            scrollX: true,
            scrollY: 200,
            autoWidth: false,
            paging: false,

            orderable: false,
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
        //Graficos


    });
</script>
<script>
    function verdetalle(id, arrestado, ci, foto, nacido, nacionalidad, edad, genero, gestion, fechahecho, hora, mesregistro, departamento, provincia, municipio, localidad, zonabarrio, lugarhecho, gps, unidad, temperancia, causaarresto, nathecho, arma, remitidoa, nombres, pertenencias) {
        $('.modal-title').html("Detalle del antecedente");
        $('#modalverdetalle').modal('show');
        if (foto == "persona.png") {
            $('#idimag').attr("src", 'https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg');
        } else {
            $('#idimag').attr("src", '/storage/personas/' + foto);
        }

        //$('#nombre').val(arrestado);
        //document.getElementById('nombre').innerHTML = arrestado;
        document.getElementById('arrestado').innerHTML = arrestado;
        document.getElementById('ci').innerHTML = ci;

        document.getElementById('genero').innerHTML = genero;
        document.getElementById('gestion').innerHTML = gestion;
        document.getElementById('fechahecho').innerHTML = fechahecho;
        document.getElementById('hora').innerHTML = hora;
        document.getElementById('mesregistro').innerHTML = mesregistro;
        document.getElementById('departamento').innerHTML = departamento;
        document.getElementById('provincia').innerHTML = provincia;
        document.getElementById('municipio').innerHTML = municipio;
        document.getElementById('localidad').innerHTML = localidad;
        document.getElementById('zonabarrio').innerHTML = zonabarrio;
        document.getElementById('lugarhecho').innerHTML = lugarhecho;
        document.getElementById('gps').innerHTML = gps;
        document.getElementById('unidad').innerHTML = unidad;
        document.getElementById('temperancia').innerHTML = temperancia;
        document.getElementById('causaarresto').innerHTML = causaarresto;
        document.getElementById('nathecho').innerHTML = nathecho;
        document.getElementById('arma').innerHTML = arma;
        document.getElementById('remitidoa').innerHTML = remitidoa;
        document.getElementById('nombres').innerHTML = nombres;
        document.getElementById('pertenencias').innerHTML = pertenencias;
        //alert(id);
    }
</script>
<script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart', 'bar']
    });
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawMonthlyChart);
    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawMonthlyChart(chart_data, chart_main_title) {
        let jsonData = chart_data;
        // Create the data table.
        let data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Cantidad');
        $.each(jsonData, (i, jsonData) => {
            let month = jsonData.month;
            let profit = parseFloat($.trim(jsonData.profit));
            data.addRows([
                [month, profit]
            ]);
        });
        data.addRows([
            // ['Mushrooms', 140],
            // ['Onions', 50],
            // ['Olives', 30],
            // ['Zucchini', 20],
            // ['Pepperoni', 12]
        ]);
        // Set chart options
        var options = {
            // 'title': 'Check Monthly Profit',
            title: chart_main_title,
            hAxis: {
                title: "Meses"
            },
            vAxis: {
                title: "Cantidad"
            },
            colors: ['black'],

            chartArea: {
                width: '50%',
                height: '80%'
            }
        }
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

    function load_monthly_data(year, title) {
        const temp_title = title + ' ' + year;
        $.ajax({
            url: "{{route('admin.chart')}}",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                year: year
            },
            dataType: "JSON",
            success: function(data) {
                drawMonthlyChart(data, temp_title);
            }
        });
        console.log(`Year: ${year}`);
    }
</script>

<script>
    $(document).ready(function() {
        $('#year').change(function() {
            var year = $(this).val();
            if (year != '') {
                load_monthly_data(year, 'Datos del mes para:');
            }
        });
    });
</script>
@stop