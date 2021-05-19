@extends('layouts.app')

@section('navbar')
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
        <a class="nav-link text-success" href="{{ url('/moders') }}">Inicio <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('moders.consulta') }}">Consulta <span class="sr-only">(current)</span></a>
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
<div class="content-fluid">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item" title="Mi registro" data-toggle="tooltip" data-html="true"><a class="nav-link active" href="#activity" data-toggle="tab">Antecedentes</a></li>
                    <li class="text-dark">_</li>
                    <li class="nav-item" title="Registrar nuevo antecedente" data-toggle="tooltip" data-html="true"><a class="nav-link btn btn-block btn-outline-primary btn-sm" href="#settings" data-toggle="tab">Registrar Antecedente</a></li>
                </ul>
            </div><!-- /.card-header -->

            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="row">

                            <div class="ml-auto p-2">
                                <div class="">
                                    <a href="{{url('/moders/enviarantecedentes')}}" onclick="
return confirm('¿Seguro que quiere guardar en la base de datos?')" class="btn btn-info btn-sm" data-toggle="tooltip" data-html="true" title="Clic para enviar a la central"><i class="fa fa-database"></i> Enviar todo</a>
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{3}}" data-original-title="Eliminar todos los registros de la tabla actual" class="btn btn-danger btn-sm deleteRecord"><i class="fa fa-times"></i> Limpiar tabla</a>
                                </div>


                            </div>
                        </div>
                        <table id="mytable" class="datatable stripe row-border order-column" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Acciones</th>
                                    <th>Arrestado</th>
                                    <th>CI</th>
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



                        </table>

                    </div>


                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal" action="{{ route('moders.store')}}" method="POST">
                            @csrf
                            <div class="row bg-light text-dark">

                                <div class="col-md-6 mt-2">
                                    <div class="form-group row">
                                        <label for="ARRESTADO" class="col-sm-4 col-form-label">ARRESTADO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="arrestado" class="form-control" placeholder="ARRESTADO" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ci" class="col-sm-4 col-form-label">CI</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="cival" name="ci" class="form-control" placeholder="CI" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="NACIDO EN" class="col-sm-4 col-form-label">NACIDO EN</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nacido" value="ORURO" class="awesomplete form-control" placeholder="NACIDO EN" autocomplete="off" data-list="ORURO,LA PAZ,COCHABAMBA,SANTA CRUZ,POTOSI,TARIJA,CHUQUISACA,BENI,PANDO" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="NACIONALIDAD" class="col-sm-4 col-form-label">NACIONALIDAD</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="BOLIVIANO" name="nacionalidad" placeholder="NACIONALIDAD" class="awesomplete form-control" placeholder="NACIDO EN" autocomplete="off" data-list="VENEZOLANO,PERUANO,ARGENTINO,CHILENO,BRASILERO,BOLIVIANO" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="EDAD" class="col-sm-4 col-form-label">EDAD</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="edadArr" name="edad" class="form-control" placeholder="EDAD" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="GENERO" class="col-sm-4 col-form-label">GENERO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="genero" value="VARON" class="awesomplete form-control" placeholder="GENERO" autocomplete="off" data-list="VARON,MUJER,OTRO" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="card bg-light text-dark">


                                        <div class="card-header bg-light text-dark">
                                            Ajustar imagen
                                        </div>
                                        <div class="card-body">
                                            <input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
                                            <img id="idimag" class="profile-user-img img-fluid img-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">
                                        </div>
                                        <label for="fotopersona" class="col-sm-4 col-form-label">Imagen</label>
                                        <div class="col-sm-8">

                                            <input type="text" name="fotopersona" id="fotopersona" value="persona.png" class="form-control" readonly required>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group row">
                                        <label for="gestion" class="col-sm-4 col-form-label">GESTION</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="gestion" id="intLimitTextBox" value="2021" class="form-control" placeholder="GESTION" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="FECHA" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="fechahecho" id="mydate" class="form-control" placeholder="FECHA" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="HORA" class="col-sm-4 col-form-label">HORA DEL HECHO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="hora" class="form-control hora" value="00:00" placeholder="HORA DEL HECHO" maxlength="5" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="MES" class="col-sm-4 col-form-label">MES REGISTRO</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="latinTextBox" name="mesregistro" class="awesomplete form-control" placeholder="MES REGISTRO" autocomplete="off" data-list="ENERO,FEBRERO,MARZO,ABRIL,MAYO,JUNIO,JULIO,AGOSTO,SEPTIEMBRE,OCTUBRE,NOVIEMBRE,DICIEMBRE" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">
                                            <div class="invalid-feedback">
                                                Mes válido por favor.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="DEPARTAMENTOS" class="col-sm-4 col-form-label">DEPARTAMENTOS</label>
                                        <div class="col-sm-8">
                                            <input id="deptoid" type="text" name="departamento" class="awesomplete form-control" placeholder="DEPARTAMENTOS" value="ORURO" autocomplete="off" data-list="ORURO,LA PAZ,COCHABAMBA,SANTA CRUZ,POTOSI,TARIJA,CHUQUISACA,BENI,PANDO" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="PROVINCIA" class="col-sm-4 col-form-label">PROVINCIAS</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="soloprov" value="CERCADO" name="provincia" class="awesomplete form-control" autocomplete="off" data-list="SABAYA, CARANGAS, CERCADO, LADISLAO CABRERA, LITORAL, MEJILLONES, NOR CARANGAS, PANTALÉON DALENCE, POOPÓ, SAJAMA, PEDRO DE TOTORA, SAUCARÍ, SEBASTIÁN PAGADOR, SUD CARANGAS, TOMÁS BARRÓN" data-minChars="1" placeholder="PROVINCIAS" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="MUNICIPIOS" class="col-sm-4 col-form-label">MUNICIPIOS</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="soloMUN" name="municipio" class="form-control" placeholder="MUNICIPIOS" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="LOCALIDADES" class="col-sm-4 col-form-label">LOCALIDADES</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="localidad" class="form-control" placeholder="LOCALIDADES" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ZONA O BARRIO" class="col-sm-4 col-form-label">ZONA BARRIO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="zonabarrio" class="form-control" placeholder="ZONA BARRIO" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="LUGAR HECHO" class="col-sm-4 col-form-label">LUGAR HECHO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="lugarhecho" class="form-control" placeholder="LUGAR HECHO" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="UNIDAD" class="col-sm-4 col-form-label">UNIDAD</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="unidad" value="FELCC" class="form-control" placeholder="UNIDAD" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="TEMPERANCIA" class="col-sm-4 col-form-label">TEMPERANCIA</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="SOBRIO" name="temperancia" class="form-control" placeholder="TEMPERANCIA" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="CAUSA ARRESTO" class="col-sm-4 col-form-label">CAUSA ARRESTO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="causaarresto" class="awesomplete form-control" placeholder="CAUSA ARRESTO" autocomplete="off" data-list="POR COMISION DEL DELITO (F.E.L.C.C.), ADUANA, POR COMISION DEL DELITO (F.E.L.C.N),POR COMISION DEL DELITO (F.E.LC.C.)" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="NATHECHO" class="col-sm-4 col-form-label">NATURALEZA DEL HECHO</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nathecho" class="form-control" placeholder="Ej: Robo, Asalto, etc." required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ARMA" class="col-sm-4 col-form-label">ARMA</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="NINGUNO" name="arma" class="form-control" placeholder="ARMA" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="REMITIDO A" class="col-sm-4 col-form-label">REMITIDO A</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="remitidoa" value="FELCC" class="awesomplete form-control" placeholder="REMITIDO A" placeholder="CAUSA ARRESTO" autocomplete="off" data-list="FELCC,FELCV,FELCN)" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="ACCION DIRECTA" class="col-sm-4 col-form-label">ACCION DIRECTA</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="nombres" class="form-control" placeholder="Ej: Sgto. 1ro Juan Manuel" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="PERTENENCIAS" class="col-sm-4 col-form-label">PERTENENCIAS</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="NINGUNO" name="pertenencias" class="form-control" placeholder="PERTENENCIAS" required onkeyup="this.value = this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="GPS" class="col-sm-4 col-form-label">GPS</label>
                                        <div class="col-sm-8">
                                            <input type="text" id="gps" value="-17.969944,-67.115266" name="gps" class="form-control" placeholder="GPS" required>
                                        </div>

                                    </div>

                                </div>



                            </div>
                            <div class="card bg-secondary">
                                <div class="container-fluid h-100">
                                    <div class="row w-100 align-items-center">
                                        <div class="form-group ">
                                            <div class="col text-center">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" required> Estoy de acuerdo <a>Con los términos de registro</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="">
                                                <button type="submit" class="btn btn-info">Guardar registro</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


</div>
<div id="imageModel" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajusta el imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <br />
                        <br />
                        <br />
                        <button class="btn btn-success crop_image">Guardar Foto</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cerrarmod" class="btn btn-default">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/css/awesomplete.base.css">
<link rel="stylesheet" href="/css/awesomplete.theme.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
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

<script type="text/javascript" src="/js/awesomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> -->

<!-- CRUD -->
<script>
    $('#cerrarmod').click(function() {
        setTimeout(function() {
            location.reload();
        }, 500);
    });
    $(document).ready(function() {
        // init datatable.
        var dataTable = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "300px",
            scrollX: true,
            autoWidth: false,
            "order": [
                [0, "desc"]
            ],
            ajax: "{{ route('getrecords') }}",
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
                },
                {
                    data: 'nombres',
                    name: 'nombres'
                },
                {
                    data: 'pertenencias',
                    name: 'pertenencias'
                },

            ],
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
    var date = $("#mydate").datepicker({
        dateFormat: 'mm/dd/yy'
    }).val();
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
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 2025);
    });
    //Solo acepta El abecedario deptoid soloMUN edadArr
    setInputFilter(document.getElementById("soloprov"), function(value) {
        return /^[a-z]*$/i.test(value);
    });
    setInputFilter(document.getElementById("deptoid"), function(value) {
        return /^[a-z]*$/i.test(value);
    });
    setInputFilter(document.getElementById("soloMUN"), function(value) {
        return /^[a-z]*$/i.test(value);
    });

    //Edad validacion
    setInputFilter(document.getElementById("edadArr"), function(value) {
        return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 200);
    });
    //Solo acepta coordenadas
    setInputFilter(document.getElementById("gps"), function(value) {
        return /^(-?\d+(\.\d+)?),\s*(-?\d+(\.\d+)?)$/i.test(value);
    });
    setInputFilter(document.getElementById("cival"), function(value) {
        return /^[A-Za-z0-9\s]+$/g.test(value);
    });

    $(function() {

        const tiempoTranscurrido = Date.now();
        const hoy = new Date(tiempoTranscurrido);
        const anoActual = hoy.getFullYear();
        //console.log(anoActual); //2021

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
<script>
    document.querySelectorAll(".hora").forEach(el => el.addEventListener("keypress", setHora));

    function setHora(e) {
        e.preventDefault();
        if (this.value.length == 2) {

            this.value += ":";
        }
        // verificamos que el valor no supere los 5 caracteres,
        // que sea un numero y que no supere las 24:59

        if (this.value.length >= 5 || /[0-9]/.test(e.key) == false ||
            (this.value.length == 0 && e.key > 2) ||
            (this.value.length == 1 && e.key > 3) ||
            (this.value.length == 3 && e.key > 5)
        ) {
            return;
        }
        this.value += e.key;
    }
</script>
<script>
    /* function readURL(input, id) {
        id = id || '#modal-preview';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('#modal-preview').removeClass('hidden');
            $('#start').hide();
        }
    } */
</script>
<script>
    $(document).ready(function() {
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle' //circle o square
            },
            boundary: {
                width: 300,
                height: 300
            }
        });
        $('#before_crop_image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#imageModel').modal('show');
        });
        $('.crop_image').click(function(event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $.ajax({
                    url: "{{url('moders/editimage')}}",
                    type: 'POST',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                        'image': response
                    },
                    success: function(data) {
                        $('#imageModel').modal('hide');
                        //alert('Crop image has been uploaded');
                        var json = $.parseJSON(data); // create an object with the key of the array
                        //console.log(json.nombrefoto);
                        $('#idimag').attr("src", 'storage/personas/' + json.nombrefoto);
                        $('#fotopersona').val(json.nombrefoto);

                    }
                })
            });
        });

    });
</script>
<!-- eliminar record -->
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '.deleteRecord', function() {

            var Record_id = $(this).data("id");
            confirm("¿Seguro desea eliminar todos los registros!!!?");

            $.ajax({
                type: "POST",
                url: "{{url('moders/deleterecord')}}/" + Record_id,

                success: function(data) {
                    //table.draw();
                    setTimeout(function() {
                                location.reload();
                            }, 1000);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

    });
</script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection