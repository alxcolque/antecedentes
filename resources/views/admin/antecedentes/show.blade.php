@extends('adminlte::page')

@section('title', 'FELCC')
@section('plugins.Sweetalert2', true)

@section('content_header')

@stop

@section('content')

<!-- Tablas de antecedentes mas reciente -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center" title="Foto de la persona" data-toggle="tooltip" data-html="true">
                        <img class="profile-user-img img-fluid img-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">
                    </div>
                    
                    <h3 class="profile-username text-center">{{$antecedent[0]->people[0]->arrestado}}</h3>

                    <p class="text-muted text-center">CI: {{$antecedent[0]->people[0]->ci}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
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
                            <b>TEMPERANCIA</b> <a class="float-right">{{$antecedent[0]->temperancia}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CAUSAS ARRESTO</b> <a class="float-right">{{$antecedent[0]->crime->causaarresto}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>NAT HECHO</b> <a class="float-right">{{$antecedent[0]->nathecho}}</a>
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
                        
                    </ul>

                    <a href="#" class="btn btn-primary btn-block" title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true"><b>IMPRIMIR</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
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
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="gestion" class="col-sm-4 col-form-label">GESTION</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->gestion}}"  placeholder="GESTION">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="FECHA" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->fechahecho}}" placeholder="FECHA">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="HORA" class="col-sm-4 col-form-label">HORA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->hora}}" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MES" class="col-sm-4 col-form-label">MES REGISTRO</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->mesregistro}}" placeholder="MES REGISTRO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="DEPARTAMENTOS" class="col-sm-4 col-form-label">DEPARTAMENTOS</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->province->department->departamento}}" id="DEPARTAMENTOS" placeholder="DEPARTAMENTOS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PROVINCIA" class="col-sm-4 col-form-label">PROVINCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->province->provincia}}" placeholder="PROVINCIAS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MUNICIPIOS" class="col-sm-4 col-form-label">MUNICIPIOS</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->municipio}}" placeholder="MUNICIPIOS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LOCALIDADES" class="col-sm-4 col-form-label">LOCALIDADES</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->localidad}}" placeholder="LOCALIDADES">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ZONA O BARRIO" class="col-sm-4 col-form-label">ZONA BARRIO</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->zonabarrio}}" placeholder="ZONA BARRIO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LUGAR HECHO" class="col-sm-4 col-form-label">LUGAR HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->lugarhecho}}" placeholder="LUGAR HECHO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="UNIDAD" class="col-sm-4 col-form-label">UNIDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->unidad}}" placeholder="UNIDAD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="NACIDO EN" class="col-sm-4 col-form-label">NACIDO EN</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->people[0]->nacido}}" placeholder="NACIDO EN">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="NACIONALIDAD" class="col-sm-4 col-form-label">NACIONALIDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->people[0]->nacionalidad}}" placeholder="NACIONALIDAD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="EDAD" class="col-sm-4 col-form-label">EDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->people[0]->edad}}" placeholder="EDAD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="GENERO" class="col-sm-4 col-form-label">GENERO</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->people[0]->genero}}" placeholder="GENERO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="TEMPERANCIA" class="col-sm-4 col-form-label">TEMPERANCIA</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->temperancia}}" placeholder="TEMPERANCIA">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="CAUSA ARRESTO" class="col-sm-4 col-form-label">CAUSA ARRESTO</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->crime->causaarresto}}" placeholder="CAUSA ARRESTO">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="NATHECHO" class="col-sm-4 col-form-label">NATHECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->nathecho}}" placeholder="NATHECHO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ARMA" class="col-sm-4 col-form-label">ARMA</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->arma}}" placeholder="ARMA">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="REMITIDO A" class="col-sm-4 col-form-label">REMITIDO A</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->remitidoa}}" placeholder="REMITIDO A">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ACCION DIRECTA" class="col-sm-4 col-form-label">ACCION DIRECTA</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->detective->nombres}}" placeholder="ACCION DIRECTA">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PERTENENCIAS" class="col-sm-4 col-form-label">PERTENENCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$antecedent[0]->pertenencias}}" placeholder="PERTENENCIAS">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Estoy de acuerdo <a href="#">Con los cambios de esta acción</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
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



@stop

@section('css')

@stop

@section('js')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

@stop