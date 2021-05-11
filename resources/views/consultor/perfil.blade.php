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
<div class="content-fluid">
  <div class="col-md-12">
    <div class="card">

      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item" title="Mi perfil" data-toggle="tooltip" data-html="true"><a class="nav-link active" href="#activity" data-toggle="tab">Mi perfil</a></li>

          <li class="nav-item" title="Actualizar perfil" data-toggle="tooltip" data-html="true"><a class="nav-link btn btn-block btn-outline-primary btn-sm" href="#settings" data-toggle="tab">Ajustes</a></li>
        </ul>
      </div><!-- /.card-header -->

      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">

            <div class="col-md-6">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center" title="Foto de la persona" data-toggle="tooltip" data-html="true">
                    @if($user->foto == "user.png")
                    <img class="profile-user-img img-fluid rounded-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">

                    @else
                    <img class="profile-user-img img-fluid rounded-circle" src="{{ asset ('/storage/users/'.$user->foto)}}" alt="User profile picture">
                    @endif

                  </div>

                  <h3 class="profile-username text-center">{{$user->name}} {{$user->lastname}}</h3>
                  @switch($user->rol)
                  @case(1)
                  <p class="text-muted text-center">
                    <span class="badge bg-success">Admin</span>
                  </p>
                  @break

                  @case(2)
                  <p class="text-muted text-center">Rol:
                    <span class="">Usuario 1</span>
                  </p>
                  @break

                  @default
                  <p class="text-muted text-center">
                    <span class="badge bg-danger">Consultor </span>
                  </p>
                  @endswitch

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Nombre de Usuario</b> <a class="float-right">{{$user->username}}</a>
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

          </div>


          <div class="tab-pane" id="settings">
            <div class="col-md-6">
              <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="text-center" title="Foto de la persona" data-toggle="tooltip" data-html="true">
                  @if($user->foto == "user.png")
                  <img id="idimag" class="profile-user-img img-fluid rounded-circle" src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" alt="User profile picture">


                  @else
                  <img id="idimag" class="profile-user-img img-fluid rounded-circle" src="{{ asset ('/storage/users/'.$user->foto)}}" alt="User profile picture">
                  @endif
                  <div class="file-field">
                    <div class="btn btn-primary btn-sm float-left">
                      <span>Cambiar foto</span>
                      <input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
                    </div>
                    <div class="file-path-wrapper">
                      <input type="text" id="foto" name="foto" class="form-control" value="{{$user->foto}}" placeholder="Foto" required readonly>
                    </div>
                  </div>

                </div>

                <div class="form-group row">

                  <div class="col-sm-8">

                  </div>
                </div>
                <div class="form-group row">
                  <label for="nombres" class="col-sm-4 col-form-label">Nombres</label>
                  <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" value="{{$user->nombres}}" placeholder="nombres" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="apellidos" class="col-sm-4 col-form-label">Apellidos</label>
                  <div class="col-sm-8">
                    <input type="text" name="lastname" class="form-control" value="{{$user->lastname}}" placeholder="apellidos" required>
                  </div>
                </div>



                <div class="form-group row">
                  <div class="offset-sm-3 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" required> Estoy de acuerdo <a href="#">Con los cambios de esta acción</a>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-sm-5 col-sm-10">
                    <button type="submit" class="btn btn-info">Actualizar perfil</button>
                  </div>
                </div>
              </form>
            </div>

          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>


</div>

<!-- Fin contenido -->
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
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  })
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
          url: "{{url('moders/profileimage')}}",
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
            $('#idimag').attr("src", '/storage/users/' + json.nombrefoto);
            $('#foto').val(json.nombrefoto);

          }
        })
      });
    });

  });
</script>
@endsection