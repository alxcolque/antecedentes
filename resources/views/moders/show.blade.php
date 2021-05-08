@extends('layouts.app')
@section('navbar')
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/moders') }}">Inicio <span class="sr-only">(current)</span></a>
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
<!-- Fin mensajes -->
<!-- Tablas de antecedentes mas reciente -->
<!-- contenido -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">

            <!-- Profile Image -->
            <div id="content" class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center" title="Foto de la persona" data-toggle="tooltip" data-html="true">
                        @if($antecedent->fotopersona == "persona.png")
                        <img class="profile-user-img img-fluid img-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">
                        
                        @else
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset ('/storage/personas/'.$antecedent->fotopersona)}}" alt="User profile picture">
                        @endif

                    </div>
                    <h3 class="profile-username text-center">{{$antecedent->arrestado}}</h3>

                    <p class="text-muted text-center">CI: {{$antecedent->ci}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>GESTION</b> <a class="float-right">{{$antecedent->gestion}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>FECHA DEL HECHO</b> <a class="float-right">{{$antecedent->fechahecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>HORA DEL HECHO</b> <a class="float-right">{{$antecedent->hora}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>MES DE REGISTRO</b> <a class="float-right">{{$antecedent->mesregistro}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>DEPARTAMENTOS</b> <a class="float-right">{{$antecedent->departamento}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>PROVINCIAS</b> <a class="float-right">{{$antecedent->provincia}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>MUNICIPIOS</b> <a class="float-right">{{$antecedent->municipio}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>LOCALIDADES</b> <a class="float-right">{{$antecedent->localidad}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ZONA O BARRIO</b> <a class="float-right">{{$antecedent->zonabarrio}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>LUGAR DEL HECHO</b> <a class="float-right">{{$antecedent->lugarhecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>UNIDADES</b> <a class="float-right">{{$antecedent->unidad}}</a>
                        </li>
                        <!-- <li class="list-group-item">
                            <b>DIVISION</b> <a class="float-right">FELCC</a>
                        </li>
                        <li class="list-group-item">
                            <b>DELITO</b> <a class="float-right">ROBO</a>
                        </li> -->
                        <li class="list-group-item">
                            <b>NACIODO EN</b> <a class="float-right">{{$antecedent->nacido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>NACIONALIDAD</b> <a class="float-right">{{$antecedent->nacionalidad}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>EDAD</b> <a class="float-right">{{$antecedent->edad}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>GENERO</b> <a class="float-right">{{$antecedent->genero}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>TEMPERANCIA</b> <a class="float-right">{{$antecedent->temperancia}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CAUSAS ARRESTO</b> <a class="float-right">{{$antecedent->causaarresto}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>NAT HECHO</b> <a class="float-right">{{$antecedent->nathecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ARMA</b> <a class="float-right">{{$antecedent->arma}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>REMITIDO A</b> <a class="float-right">{{$antecedent->remitidoa}}</a>
                        </li>
                        <!-- <li class="list-group-item">
                            <b>SITUACION</b> <a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>EST</b> <a class="float-right"></a>
                        </li> -->
                        <li class="list-group-item">
                            <b>ACCION DIRECTA</b> <a class="float-right">{{$antecedent->nombres}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>PERTENENCIAS</b> <a class="float-right">{{$antecedent->pertenencias}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>GPS</b> <a class="float-right">{{$antecedent->gps}}</a>
                        </li>

                    </ul>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="container-fluid h-100">
                    <div class="row w-100 align-items-center">
                        <div class="col text-center">
                            <button id="cmd" class="btn btn-danger  btn-sm" title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true"><b>Descargar en pdf</b></button>
                            <input class="btn btn-primary btn-sm" type='button' id='btn' value='Imprimir' onclick="printDiv('content')"  title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true">

                            <a href="javascript:void(0)" id="deleteRecord1" data-toggle="tooltip" data-id="{{$antecedent->id}}" data-original-title="Eliminar todos los registros de la tabla actual" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Eliminar este registro</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item" title="Obsevaciones" data-toggle="tooltip" data-html="true"><a class="nav-link active" href="#activity" data-toggle="tab">Observaciones</a></li>

                        <li class="nav-item" title="Sección para ajustar datos" data-toggle="tooltip" data-html="true"><a class="nav-link" href="#settings" data-toggle="tab">Ajuste</a></li>
                    </ul>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->

                            <div class="post">

                                <li class="list-group-item">
                                    <b>GPS</b> <a class="float-right">{{$antecedent->gps}}</a>
                                </li>
                                <input class="form-control form-control-sm" type="text" placeholder="Obs 1"><br>
                                <input class="form-control form-control-sm" type="text" placeholder="Obs 2"><br>
                                <input class="form-control form-control-sm" type="text" placeholder="Obs 3"><br>
                                <input class="form-control form-control-sm" type="text" placeholder="Obs 4"><br>
                                <input class="form-control form-control-sm" type="text" placeholder="Obs 5"><br>
                                <input class="form-control form-control-sm" type="text" placeholder="Obs 6"><br>
                                <input class="form-control form-control-sm" type="text" placeholder="Obs 7"><br>
                                <input class="form-control form-control-sm" type="text" placeholder="Obs 8"><br>

                            </div>
                            <!-- /.post -->


                        </div>


                        <div class="tab-pane" id="settings">
                            <div class="alert alert-warning alert-dismissible fade show">Le sugiero que haga cambios con mucho cuidado !!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" action="{{ route('moders.update', $antecedent->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="text-center" title="Foto de la persona" data-toggle="tooltip" data-html="true">
                                    @if($antecedent->fotopersona == "persona.png")

                                    <img id="idimag" class="profile-user-img img-fluid img-circle" src="{{ asset ('/storage/personas/'.$antecedent->fotopersona)}}" alt="User profile picture">

                                    @else
                                    <img id="idimag" class="profile-user-img img-fluid img-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">
                                    @endif

                                    <input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
                                </div>
                                <div class="col-sm-8">

                                </div>

                                <div class="form-group row">
                                    <label for="foto" class="col-sm-4 col-form-label">FOTOGRAFIA</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="fotopersona" name="fotopersona" class="form-control" value="{{$antecedent->fotopersona}}" placeholder="Foto" required readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="arrestado" class="col-sm-4 col-form-label">PERSONA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="arrestado" class="form-control" value="{{$antecedent->arrestado}}" placeholder="PERSONA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ci" class="col-sm-4 col-form-label">CI</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="ci" id="cival" class="form-control" value="{{$antecedent->ci}}" placeholder="CI" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gestion" class="col-sm-4 col-form-label">GESTION</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="gestion" id="intLimitTextBox" class="form-control" value="{{$antecedent->gestion}}" placeholder="GESTION" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="FECHA" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="mydate" name="fechahecho" class="form-control" value="{{$antecedent->fechahecho}}" placeholder="FECHA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="HORA" class="col-sm-4 col-form-label">HORA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="hora" class="form-control" value="{{$antecedent->hora}}" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MES" class="col-sm-4 col-form-label">MES REGISTRO</label>
                                    <div class="col-sm-8">

                                        <input type="text" value="{{$antecedent->mesregistro}}" id="mesregistro" name="mesregistro" class="awesomplete form-control" placeholder="MES REGISTRO" autocomplete="off" data-list="ENERO,FEBRERO,MARZO,ABRIL,MAYO,JUNIO,JULIO,AGOSTO,SEPTIEMBRE,OCTUBRE,NOVIEMBRE,DICIEMBRE" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="DEPARTAMENTOS" class="col-sm-4 col-form-label">DEPARTAMENTOS</label>
                                    <div class="col-sm-8">
                                        <input id="deptoid" type="text" name="departamento" class="awesomplete form-control" placeholder="DEPARTAMENTOS" value="{{$antecedent->departamento}}" autocomplete="off" data-list="ORURO,LA PAZ,COCHABAMBA,SANTA CRUZ,POTOSI,TARIJA,CHUQUISACA,BENI,PANDO" data-minChars="1" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PROVINCIA" class="col-sm-4 col-form-label">PROVINCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="text" value="{{$antecedent->provincia}}" id="soloprov" name="provincia" class="awesomplete form-control" autocomplete="off" data-list="SABAYA, CARANGAS, CERCADO, LADISLAO CABRERA, LITORAL, MEJILLONES, NOR CARANGAS, PANTALÉON DALENCE, POOPÓ, SAJAMA, PEDRO DE TOTORA, SAUCARÍ, SEBASTIÁN PAGADOR, SUD CARANGAS, TOMÁS BARRÓN" data-minChars="1" placeholder="PROVINCIAS" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MUNICIPIOS" class="col-sm-4 col-form-label">MUNICIPIOS</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="soloMUN" name="municipio" class="form-control" value="{{$antecedent->municipio}}" placeholder="MUNICIPIOS" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LOCALIDADES" class="col-sm-4 col-form-label">LOCALIDADES</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="localidad" class="form-control" value="{{$antecedent->localidad}}" placeholder="LOCALIDADES" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ZONA O BARRIO" class="col-sm-4 col-form-label">ZONA BARRIO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="zonabarrio" class="form-control" value="{{$antecedent->zonabarrio}}" placeholder="ZONA BARRIO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LUGAR HECHO" class="col-sm-4 col-form-label">LUGAR HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="lugarhecho" class="form-control" value="{{$antecedent->lugarhecho}}" placeholder="LUGAR HECHO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="UNIDAD" class="col-sm-4 col-form-label">UNIDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="unidad" class="form-control" value="{{$antecedent->unidad}}" placeholder="UNIDAD" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="NACIDO EN" class="col-sm-4 col-form-label">NACIDO EN</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nacido" class="form-control" value="{{$antecedent->nacido}}" placeholder="NACIDO EN" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="NACIONALIDAD" class="col-sm-4 col-form-label">NACIONALIDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nacionalidad" class="form-control" value="{{$antecedent->nacionalidad}}" placeholder="NACIONALIDAD" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="EDAD" class="col-sm-4 col-form-label">EDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edadArr" name="edad" class="form-control" value="{{$antecedent->edad}}" placeholder="EDAD" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="GENERO" class="col-sm-4 col-form-label">GENERO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="genero" class="form-control" value="{{$antecedent->genero}}" placeholder="GENERO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="TEMPERANCIA" class="col-sm-4 col-form-label">TEMPERANCIA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="temperancia" class="form-control" value="{{$antecedent->temperancia}}" placeholder="TEMPERANCIA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="CAUSA ARRESTO" class="col-sm-4 col-form-label">CAUSA ARRESTO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="causaarresto" class="form-control" value="{{$antecedent->causaarresto}}" placeholder="CAUSA ARRESTO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="NATHECHO" class="col-sm-4 col-form-label">NATHECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nathecho" class="form-control" value="{{$antecedent->nathecho}}" placeholder="NATHECHO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ARMA" class="col-sm-4 col-form-label">ARMA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="arma" class="form-control" value="{{$antecedent->arma}}" placeholder="ARMA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="REMITIDO A" class="col-sm-4 col-form-label">REMITIDO A</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="remitidoa" class="form-control" value="{{$antecedent->remitidoa}}" placeholder="REMITIDO A" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ACCION DIRECTA" class="col-sm-4 col-form-label">ACCION DIRECTA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombres" class="form-control" value="{{$antecedent->nombres}}" placeholder="ACCION DIRECTA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PERTENENCIAS" class="col-sm-4 col-form-label">PERTENENCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pertenencias" class="form-control" value="{{$antecedent->pertenencias}}" placeholder="PERTENENCIAS" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="GPS" class="col-sm-4 col-form-label">GPS</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="gps" name="gps" class="form-control" value="{{$antecedent->gps}}" placeholder="GPS" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" required> Estoy de acuerdo <a href="#">Con los cambios de esta acción</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-info">Actualizar</button>
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
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Fin contenido -->
@endsection
@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/css/awesomplete.base.css">
<link rel="stylesheet" href="/css/awesomplete.theme.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="/js/awesomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<!-- Validaciones -->

<script>
    var date = $("#mydate").datepicker({
        dateFormat: 'mm/dd/yy'
    }).val();
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
    setInputFilter(document.getElementById("mesregistro"), function(value) {
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
        //doc.save('sample-file.pdf');
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
                        $('#idimag').attr("src", '/storage/personas/' + json.nombrefoto);
                        $('#fotopersona').val(json.nombrefoto);

                    }
                })
            });
        });

    });
</script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('body').on('click', '#deleteRecord1', function() {

            var Record_id = $(this).data("id");
            confirm("¿Seguro desea eliminar este registro!!!?");
            console.log(Record_id);
            $.ajax({
                type: "POST",
                url: "{{url('moders/deleter')}}/" + Record_id,

                success: function(data) {
                    top.location.href = "{{ url('/moders') }}"; //redirection
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });

    });
</script>
@endsection