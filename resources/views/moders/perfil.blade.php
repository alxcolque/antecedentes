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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid rounded-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$user->nombres}} {{$user->apellidos}}</h3>
                        @switch($user->rol)
                        @case(1)
                        <p class="text-muted text-center">
                        <span class="badge bg-success">Admin</span></p>
                        @break

                        @case(2)
                        <p class="text-muted text-center">Rol: 
                        <span class="">Usuario 1</span></p>
                        @break

                        @default
                        <p class="text-muted text-center">
                        <span class="badge bg-danger">Consultor </span></p>
                        @endswitch

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Nombre de Usuario</b> <a class="float-right">{{$user->nombreusuario}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <!-- <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="ssettings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
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
                  
                </div>
                
              </div>
            </div>
          </div> -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


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
@endsection