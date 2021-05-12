@extends('layouts.app')
@section('navbar')
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/moders') }}">Inicio <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link text-success" href="{{ route('moders.consulta') }}">Consulta <span class="sr-only">(current)</span></a>
    </li>
</ul>
@endsection
@section('content')
<!-- Mensajes -->
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

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
<!-- Fin mensajes -->
<!-- Tablas de antecedentes mas reciente -->
<!-- contenido -->
<div class="content-fluid">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header p-2">
                <h5>Consulta antecedente</h5>
            </div><!-- /.card-header -->

            <div class="card-body">

                <form action="{{route('moders.resultado')}}" method="get">
                    <div class="input-group mb-3 col-sm-8">

                        <input type="text" name="text" id="search" class="form-control form-control-lg" placeholder="Escriba un nombre aquí para encontrar un antecedente (ej. Juan)" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit" id="button-addon2"> <i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </form>

                @if(count($antecedents) >= 0)

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
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
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
                                            <button id="cmd" class="btn btn-danger" title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true"><b>Descargar en pdf</b></button>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('css')
    <link rel="stylesheet" href="{{asset('/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
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
    @endsection
    @section('js')

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        //var cursos = ['html', 'php', 'python'];
        $('#search').autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "{{route('moders.search')}}",
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
        });
    </script>
    <script>
        function verdetalle(id, arrestado, ci, foto, nacido, nacionalidad, edad, genero, gestion, fechahecho, hora, mesregistro, departamento, provincia, municipio, localidad, zonabarrio, lugarhecho, gps, unidad, temperancia, causaarresto, nathecho, arma, remitidoa, nombres, pertenencias) {
            $('.modal-title').html("Detalle del antecedente");
            $('#modalverdetalle').modal('show');
            if (foto == "persona.png") {
                $('#idimag').attr("src",'https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg');
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
    @endsection