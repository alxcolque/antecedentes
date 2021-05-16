@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<a href="{{url('admin/import')}}" class="btn btn-info btm-sm btn-blok"><i class="fas fa-arrow-left"></i> Volver atrás</a>
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
                            
                            <input class="btn btn-primary btn-sm" type='button' id='btn' value='Imprimir' onclick="printDiv('content')" title="Clic para imprimir este registro" data-toggle="tooltip" data-html="true">

                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->


<!-- Fin contenido -->

@stop

@section('css')


@stop

@section('js')


<!-- Validaciones -->
<script>
    
    /* Imprimir */
    function printDiv(nombreDiv) {
        var contenido = document.getElementById(nombreDiv).innerHTML;
        var contenidoOriginal = document.body.innerHTML;
        document.body.innerHTML = contenido;
        window.print();
        document.body.innerHTML = contenidoOriginal;
    }
</script>