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
                        @if($antecedent->fotopersona)
                        
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset ('/storage/personas/'.$antecedent->fotopersona)}}" alt="User profile picture">
                        @else
                        <img class="profile-user-img img-fluid img-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">
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
                            <button id="cmd" class="btn btn-danger" title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true"><b>Descargar en pdf</b></button>
                            <input class="btn btn-primary" type='button' id='btn' value='Imprimir' onclick='printDiv();'>
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
                            <form class="form-horizontal" action="{{ route('admin.antecedentes.update', $antecedent->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="gestion" class="col-sm-4 col-form-label">GESTION</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="gestion" class="form-control" value="{{$antecedent->gestion}}" placeholder="GESTION">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="FECHA" class="col-sm-4 col-form-label">FECHA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="fechahecho" class="form-control" value="{{$antecedent->fechahecho}}" placeholder="FECHA">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="HORA" class="col-sm-4 col-form-label">HORA DEL HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="hora" class="form-control" value="{{$antecedent->hora}}" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MES" class="col-sm-4 col-form-label">MES REGISTRO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="mesregistro" class="form-control" value="{{$antecedent->mesregistro}}" placeholder="MES REGISTRO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="DEPARTAMENTOS" class="col-sm-4 col-form-label">DEPARTAMENTOS</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="departamento" class="form-control" value="{{$antecedent->departamento}}" id="DEPARTAMENTOS" placeholder="DEPARTAMENTOS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PROVINCIA" class="col-sm-4 col-form-label">PROVINCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="provincia" class="form-control" value="{{$antecedent->provincia}}" placeholder="PROVINCIAS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="MUNICIPIOS" class="col-sm-4 col-form-label">MUNICIPIOS</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="municipio" class="form-control" value="{{$antecedent->municipio}}" placeholder="MUNICIPIOS">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LOCALIDADES" class="col-sm-4 col-form-label">LOCALIDADES</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="localidad" class="form-control" value="{{$antecedent->localidad}}" placeholder="LOCALIDADES">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ZONA O BARRIO" class="col-sm-4 col-form-label">ZONA BARRIO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="zonabarrio" class="form-control" value="{{$antecedent->zonabarrio}}" placeholder="ZONA BARRIO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="LUGAR HECHO" class="col-sm-4 col-form-label">LUGAR HECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="lugarhecho" class="form-control" value="{{$antecedent->lugarhecho}}" placeholder="LUGAR HECHO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="UNIDAD" class="col-sm-4 col-form-label">UNIDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="unidad" class="form-control" value="{{$antecedent->unidad}}" placeholder="UNIDAD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="NACIDO EN" class="col-sm-4 col-form-label">NACIDO EN</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nacido" class="form-control" value="{{$antecedent->nacido}}" placeholder="NACIDO EN">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="NACIONALIDAD" class="col-sm-4 col-form-label">NACIONALIDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nacionalidad" class="form-control" value="{{$antecedent->nacionalidad}}" placeholder="NACIONALIDAD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="EDAD" class="col-sm-4 col-form-label">EDAD</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="edad" class="form-control" value="{{$antecedent->edad}}" placeholder="EDAD">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="GENERO" class="col-sm-4 col-form-label">GENERO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="genero" class="form-control" value="{{$antecedent->genero}}" placeholder="GENERO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="TEMPERANCIA" class="col-sm-4 col-form-label">TEMPERANCIA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="temperancia" class="form-control" value="{{$antecedent->temperancia}}" placeholder="TEMPERANCIA">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="CAUSA ARRESTO" class="col-sm-4 col-form-label">CAUSA ARRESTO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="causaarresto" class="form-control" value="{{$antecedent->causaarresto}}" placeholder="CAUSA ARRESTO">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="NATHECHO" class="col-sm-4 col-form-label">NATHECHO</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nathecho" class="form-control" value="{{$antecedent->nathecho}}" placeholder="NATHECHO">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ARMA" class="col-sm-4 col-form-label">ARMA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="arma" class="form-control" value="{{$antecedent->arma}}" placeholder="ARMA">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="REMITIDO A" class="col-sm-4 col-form-label">REMITIDO A</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="remitidoa" class="form-control" value="{{$antecedent->remitidoa}}" placeholder="REMITIDO A">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="ACCION DIRECTA" class="col-sm-4 col-form-label">ACCION DIRECTA</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="nombres" class="form-control" value="{{$antecedent->nombres}}" placeholder="ACCION DIRECTA">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PERTENENCIAS" class="col-sm-4 col-form-label">PERTENENCIAS</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="pertenencias" class="form-control" value="{{$antecedent->pertenencias}}" placeholder="PERTENENCIAS">
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


<!-- Fin contenido -->
@endsection
@section('css')

@endsection
@section('js')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
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
        doc.save('sample-file.pdf');
    });
    /* Imprimir */
    function printDiv() {

        var divToPrint = document.getElementById('content');

        var newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

        newWin.document.close();

        setTimeout(function() {
            newWin.close();
        }, 10);

    }
</script>
@endsection