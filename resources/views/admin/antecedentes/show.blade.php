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
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">
                    </div>
                    
                    <h3 class="profile-username text-center">Juan Manuel Perez</h3>

                    <p class="text-muted text-center">CI: 7524555</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>GESTION</b> <a class="float-right">2020</a>
                        </li>
                        <li class="list-group-item">
                            <b>FECHA DEL HECHO</b> <a class="float-right">{{$antecedent->fechahecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>MES DE REGISTRO</b> <a class="float-right">{{$antecedent->mesregistro}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>DEPARTAMENTOS</b> <a class="float-right">ORURO</a>
                        </li>
                        <li class="list-group-item">
                            <b>PROVINCIAS</b> <a class="float-right">CERCADO</a>
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
                        <li class="list-group-item">
                            <b>DIVISION</b> <a class="float-right">FELCC</a>
                        </li>
                        <li class="list-group-item">
                            <b>DELITO</b> <a class="float-right">ROBO</a>
                        </li>
                        <li class="list-group-item">
                            <b>NACIODO EN</b> <a class="float-right">ORURO</a>
                        </li>
                        <li class="list-group-item">
                            <b>NACIONALIDAD</b> <a class="float-right">BOLIVIANO</a>
                        </li>
                        <li class="list-group-item">
                            <b>EDAD</b> <a class="float-right">34</a>
                        </li>
                        <li class="list-group-item">
                            <b>GENERO</b> <a class="float-right">HOMBRE</a>
                        </li>
                        <li class="list-group-item">
                            <b>TEMPERANCIA</b> <a class="float-right">{{$antecedent->temperancia}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CAUSAS ARRESTO</b> <a class="float-right">{{$antecedent->lugarhecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>NAT HECHO</b> <a class="float-right">{{$antecedent->nathecho}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ARMA</b> <a class="float-right">{{$antecedent->arma}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>REMITIDO</b> <a class="float-right">{{$antecedent->remitidoa}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>SITUACION</b> <a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>EST</b> <a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>ACCION DIRECTA</b> <a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>PERTENENCIAS</b> <a class="float-right">{{$antecedent->pertenencias}}</a>
                        </li>
                        
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>IMPRIMIR</b></a>
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
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Observaciones</a></li>
                        
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ajuste</a></li>
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
                                    <label for="inputName" class="col-sm-4 col-form-label">GESTION</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">HORA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="HORA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">MES REGISTRO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="" placeholder="MES REGISTRO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">DEPARTAMENTOS</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="DEPARTAMENTOS" placeholder="DEPARTAMENTOS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">PROVINCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="PROVINCIAS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">MUNICIPIOS</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">LOCALIDADES</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">ZONA BARRIO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">LUGAR HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">CORRDENADAS</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">UNIDADES</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="FECHA DEL HECHO" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-4 col-form-label">Experience</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-4 col-form-label">Skills</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
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

@stop