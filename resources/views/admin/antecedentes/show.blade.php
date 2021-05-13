@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<a href="{{url('admin/antecedentes')}}" class="btn btn-info btm-sm btn-blok"><i class="fas fa-arrow-left"></i> Volver atrás</a>
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
@stop

@section('content')

<div class="card">

    <div class="row">

        <div class="col-md-6">

            <!-- Profile Image -->
            <div id="content" class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center" title="Foto de la persona" data-toggle="tooltip" data-html="true">
                        @if($antecedent[0]->people[0]->foto == "persona.png")

                        <img class="profile-user-img img-fluid img-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">
                        @else
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset ('/storage/personas/'.$antecedent[0]->people[0]->foto)}}" alt="User profile picture">

                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{$antecedent[0]->people[0]->arrestado}}</h3>

                    <p class="text-muted text-center">CI: {{$antecedent[0]->people[0]->ci}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>NACIODO EN</b> <a class="float-right">{{$antecedent[0]->people[0]->nacido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>NACIONALIDAD</b> <a class="float-right">{{$antecedent[0]->people[0]->nacionalidad}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>EDAD</b> <a class="float-right">{{$antecedent[0]->people[0]->edad}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>GENERO</b> <a class="float-right">{{$antecedent[0]->people[0]->genero}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>GESTION</b> <a class="float-right">{{$antecedent[0]->gestion}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>FECHA DEL HECHO</b> <a class="float-right">{{$antecedent[0]->fechahecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>HORA DEL HECHO</b> <a class="float-right">{{$antecedent[0]->hora}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>MES DE REGISTRO</b> <a class="float-right">{{$antecedent[0]->mesregistro}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>DEPARTAMENTOS</b> <a class="float-right">{{$antecedent[0]->province->department->departamento}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>PROVINCIAS</b> <a class="float-right">{{$antecedent[0]->province->provincia}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>MUNICIPIOS</b> <a class="float-right">{{$antecedent[0]->municipio}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>LOCALIDADES</b> <a class="float-right">{{$antecedent[0]->localidad}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ZONA O BARRIO</b> <a class="float-right">{{$antecedent[0]->zonabarrio}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>LUGAR DEL HECHO</b> <a class="float-right">{{$antecedent[0]->lugarhecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>UNIDADES</b> <a class="float-right">{{$antecedent[0]->unidad}}</a>
                        </li>
                        <!-- <li class="list-group-item">
                            <b>DIVISION</b> <a class="float-right">FELCC</a>
                        </li>
                        <li class="list-group-item">
                            <b>DELITO</b> <a class="float-right">ROBO</a>
                        </li> -->

                        <li class="list-group-item">
                            <b>TEMPERANCIA</b> <a class="float-right">{{$antecedent[0]->temperancia}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CAUSAS ARRESTO</b> <a class="float-right">{{$antecedent[0]->crime->causaarresto}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>NATURALEZA DEL HECHO</b> <a class="float-right">{{$antecedent[0]->nathecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ARMA</b> <a class="float-right">{{$antecedent[0]->arma}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>REMITIDO A</b> <a class="float-right">{{$antecedent[0]->remitidoa}}</a>
                        </li>
                        <!-- <li class="list-group-item">
                            <b>SITUACION</b> <a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>EST</b> <a class="float-right"></a>
                        </li> -->
                        <li class="list-group-item">
                            <b>ACCION DIRECTA</b> <a class="float-right">{{$antecedent[0]->detective->nombres}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>PERTENENCIAS</b> <a class="float-right">{{$antecedent[0]->pertenencias}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>GPS</b> <a class="float-right">{{$antecedent[0]->gps}}</a>
                        </li>

                    </ul>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
            <div class="card">
                <div class="container-fluid h-100">
                    <div class="row w-100 align-items-center">
                        <div class="col text-center">
                            <button id="cmd" class="btn btn-danger  btn-sm" title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true"><b>Descargar en pdf</b></button>
                            <input class="btn btn-primary btn-sm" type='button' id='btn' value='Imprimir' onclick="printDiv('content')" title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item" title="Obsevaciones" data-toggle="tooltip" data-html="true"><a class="nav-link active" href="#activity" data-toggle="tab">Observaciones</a></li>
                        <li class="text-light">_</li>
                        <li class="nav-item" title="Sección para ajustar datos" data-toggle="tooltip" data-html="true"><a class="nav-link btn btn-block btn-outline-primary btn-sm" href="#settings" data-toggle="tab">Ajuste</a></li>
                    </ul>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->

                            <div class="post">


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
                            <div class="alert alert-warning alert-dismissible fade show">Le sugiero que haga los cambios con mucho cuidado !!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="form-horizontal" action="{{ route('admin.antecedentes.update', $antecedent[0]->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="text-center" title="Foto de la persona" data-toggle="tooltip" data-html="true">
                                    @if($antecedent[0]->people[0]->foto == "persona.png")
                                    <img id="idimag" class="profile-user-img img-fluid img-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">


                                    @else
                                    <img id="idimag" class="profile-user-img img-fluid img-circle" src="{{ asset ('/storage/personas/'.$antecedent[0]->people[0]->foto)}}" alt="User profile picture">
                                    @endif
                                    <input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
                                    
                                </div>
                                <div class="col-sm-8">

                                </div>

                                <div class="form-group row">
                                    <label for="foto" class="col-sm-4 col-form-label">FOTOGRAFIA</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="fotopersona" name="fotopersona" class="form-control" value="{{$antecedent[0]->people[0]->foto}}" placeholder="Foto" required readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="arrestado" class="col-sm-4 col-form-label">PERSONA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="arrestado" class="form-control" value="{{$antecedent[0]->people[0]->arrestado}}" placeholder="PERSONA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ci" class="col-sm-4 col-form-label">CI</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="ci" id="cival" class="form-control" value="{{$antecedent[0]->people[0]->ci}}" placeholder="CI" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="NACIDO EN" class="col-sm-4 col-form-label">NACIDO EN</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nacido" class="form-control" value="{{$antecedent[0]->people[0]->nacido}}" placeholder="NACIDO EN" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="NACIONALIDAD" class="col-sm-4 col-form-label">NACIONALIDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nacionalidad" class="form-control" value="{{$antecedent[0]->people[0]->nacionalidad}}" placeholder="NACIONALIDAD" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="EDAD" class="col-sm-4 col-form-label">EDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="edadArr" name="edad" class="form-control" value="{{$antecedent[0]->people[0]->edad}}" placeholder="EDAD" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="GENERO" class="col-sm-4 col-form-label">GENERO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="genero" class="form-control" value="{{$antecedent[0]->people[0]->genero}}" placeholder="GENERO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gestion" class="col-sm-4 col-form-label">GESTION</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="gestion"  id="intLimitTextBox" class="form-control" value="{{$antecedent[0]->gestion}}" placeholder="GESTION" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="FECHA" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="mydate" name="fechahecho" class="form-control" value="{{$antecedent[0]->fechahecho}}" placeholder="FECHA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="HORA" class="col-sm-4 col-form-label">HORA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="hora" class="form-control" value="{{$antecedent[0]->hora}}" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MES" class="col-sm-4 col-form-label">MES REGISTRO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="mesregistro" id="mesregistro" class="form-control" value="{{$antecedent[0]->mesregistro}}" placeholder="MES REGISTRO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="DEPARTAMENTOS" class="col-sm-4 col-form-label">DEPARTAMENTOS</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="deptoid" name="departamento" class="form-control" value="{{$antecedent[0]->province->department->departamento}}" id="DEPARTAMENTOS" placeholder="DEPARTAMENTOS" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PROVINCIA" class="col-sm-4 col-form-label">PROVINCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="provincia" id="soloprov"  class="form-control" value="{{$antecedent[0]->province->provincia}}" placeholder="PROVINCIAS" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MUNICIPIOS" class="col-sm-4 col-form-label">MUNICIPIOS</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="municipio" id="soloMUN" class="form-control" value="{{$antecedent[0]->municipio}}" placeholder="MUNICIPIOS" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LOCALIDADES" class="col-sm-4 col-form-label">LOCALIDADES</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="localidad" class="form-control" value="{{$antecedent[0]->localidad}}" placeholder="LOCALIDADES" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ZONA O BARRIO" class="col-sm-4 col-form-label">ZONA BARRIO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="zonabarrio" class="form-control" value="{{$antecedent[0]->zonabarrio}}" placeholder="ZONA BARRIO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LUGAR HECHO" class="col-sm-4 col-form-label">LUGAR HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="lugarhecho" class="form-control" value="{{$antecedent[0]->lugarhecho}}" placeholder="LUGAR HECHO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="UNIDAD" class="col-sm-4 col-form-label">UNIDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="unidad" class="form-control" value="{{$antecedent[0]->unidad}}" placeholder="UNIDAD" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="TEMPERANCIA" class="col-sm-4 col-form-label">TEMPERANCIA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="temperancia" class="form-control" value="{{$antecedent[0]->temperancia}}" placeholder="TEMPERANCIA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="CAUSA ARRESTO" class="col-sm-4 col-form-label">CAUSA ARRESTO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="causaarresto" class="form-control" value="{{$antecedent[0]->crime->causaarresto}}" placeholder="CAUSA ARRESTO" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="NATHECHO" class="col-sm-4 col-form-label">NATURALEZA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nathecho" class="form-control" value="{{$antecedent[0]->nathecho}}" placeholder="EJ. ROBO, ASECINATO, ETC." required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ARMA" class="col-sm-4 col-form-label">ARMA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="arma" class="form-control" value="{{$antecedent[0]->arma}}" placeholder="ARMA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="REMITIDO A" class="col-sm-4 col-form-label">REMITIDO A</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="remitidoa" class="form-control" value="{{$antecedent[0]->remitidoa}}" placeholder="REMITIDO A" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ACCION DIRECTA" class="col-sm-4 col-form-label">ACCION DIRECTA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombres" class="form-control" value="{{$antecedent[0]->detective->nombres}}" placeholder="ACCION DIRECTA" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PERTENENCIAS" class="col-sm-4 col-form-label">PERTENENCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pertenencias" class="form-control" value="{{$antecedent[0]->pertenencias}}" placeholder="PERTENENCIAS" required onkeyup="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="GPS" class="col-sm-4 col-form-label">GPS</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="gps" name="gps" class="form-control" value="{{$antecedent[0]->gps}}" placeholder="GPS" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" required> Estoy de acuerdo <a class="text-secondary"> Con los cambios de esta acción</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-info">Aceptar la modificación</button>
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

@stop

@section('css')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset ('/css/awesomplete.base.css')}}">
<link rel="stylesheet" href="{{ asset ('/css/awesomplete.theme.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
@stop

@section('js')

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="{{ asset ('/js/awesomplete.min.js')}}"></script>
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

@stop