@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<h3>Control de usuarios del sistema</h3>

<div class="alert alert-warning alert-dismissible fade show print-warning-msg" role="alert" style="display:none">
    <ul></ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="alert alert-success alert-dismissible fade show print-success-msg" role="alert" style="display:none">
    <ul></ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- warning -->
@if(session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hey!</strong> {{session('warning')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- msg success -->
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
<!-- Tablas de antecedentes mas reciente -->

<div class="section">
    <div class="card">
        <div class="row" style="padding: 3px 15px;">
            <a href="javascript:void(0)" class="btn btn-success btn-sm" id="create_new"><i class="fas fa-plus"></i> Registrar nuevo usuario</a>
            <!-- <a href="/importfile" class="pull-right btn btn-success"><i class="fas fa-file-import"></i> Import</a> -->
        </div><br>
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="laravel_datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Accion</th>
                                    <th>Rol</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Usuario</th>
                                    <th>Email</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $row->id }}" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-user">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0);" id="delete-user" data-toggle="tooltip" data-original-title="Delete" data-id="{{ $row->id }}" class="delete btn btn-danger btn-sm">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @switch($row->rol)
                                        @case(1)
                                        <span class="badge bg-success">ADMINISTRADOR</span>
                                        @break

                                        @case(2)
                                        <span class="badge bg-warning">USUARIO 1</span>
                                        @break

                                        @default
                                        <span class="badge bg-danger">CONSULTOR</span>
                                        @endswitch
                                    </td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->lastname}}</td>
                                    <td class="text-info"><b>{{$row->username}}</b></td>
                                    <td> <a href="mailto:{{$row->email}}?Subject=Saludos,%20necesito%20responda%20de%20inmediato ">{{$row->email}}</a> </td>

                                    <td> 
                                        @if ($row->foto == "user.png")
                                        <img src="https://img1.freepng.es/20180623/vr/kisspng-computer-icons-avatar-social-media-blog-font-aweso-avatar-icon-5b2e99c3c1e473.3568135015297806757942.jpg" width="30" class="rounded-circle" alt="">

                                        @else
                                        <img src="{{ asset ('/storage/users/'.$row->foto)}}" width="30" class="rounded-circle" alt="">
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="my-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msg" style="display:none">
                    <ul></ul>
                </div>
                <form id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group row">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombres" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombreusuario" class="col-sm-2 col-form-label">Usuario</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario" required onkeyup="return forceLower(this);">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Confirmar contaseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmar Contraseña" required>
                            <span id='message'></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Rol" class="col-sm-2 col-form-label">Rol</label>
                        <div class="form-check col-sm-3">
                            <input class="form-check-input" type="radio" name="rol" value="1">
                            <label class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check col-sm-3">
                            <input class="form-check-input" type="radio" name="rol" value="2">
                            <label class="form-check-label">Usuario 1</label>
                        </div>
                        <div class="form-check col-sm-3">
                            <input class="form-check-input" type="radio" name="rol" checked="" value="3">
                            <label class="form-check-label">Consultor</label>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-submit" id="btn-save" value="create">Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="my-modal2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title2"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="userForm2" name="userForm2" class="form-horizontal" enctype="multipart/form-data">
                    <input type="text" id="id2" hidden>
                    <h5  >Nombre de usuario: <span class="text-primary" id="name123"></span></h5>
                    <div class="form-group row">
                        <label for="Rol" class="col-sm-2 col-form-label">Rol</label>
                        <div class="form-check col-sm-3">
                            <input class="form-check-input" type="radio" name="rol2" value="1">
                            <label class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check col-sm-3">
                            <input class="form-check-input" type="radio" name="rol2" value="2">
                            <label class="form-check-label">Usuario 1</label>
                        </div>
                        <div class="form-check col-sm-3">
                            <input class="form-check-input" type="radio" name="rol2" checked="" value="3">
                            <label class="form-check-label">Consultor</label>
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary btn-submit2" id="btn-save2" value="create">Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

<style>
    #username {
        text-transform: lowercase;
    }
</style>

@stop

@section('js')

<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

<script>
    var SITEURL = "{{URL::to('')}}";
    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#laravel_datatable').DataTable({
            processing: true,
            //serverSide: true,
            responsive: true,
            autoWidth: false,
            order: [
                [0, 'desc']
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
            },
            /*"ajax": "{{route('usu')}}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
                
                {
                    data: 'rol',
                    name: 'rol'
                },
                {
                    data: 'nombres',
                    name: 'nombres'
                },
                {
                    data: 'apellidos',
                    name: 'apellidos'
                },
                {
                    data: 'nombreusuario',
                    name: 'nombreusuario'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'foto',
                    name: 'foto',
                    orderable: false
                },
            ],*/

        });
        /*  When user click add user button */
        $('#create_new').click(function() {
            $('#btn-save').val("create-user");
            $('#user_id').val('');
            $('#userForm').trigger("reset");
            $('#title').html("Nuevo Usario");
            $('#my-modal').modal('show');

        });
        /* When click edit user */
        $('body').on('click', '.edit-user', function() {
            var user_id = $(this).data('id');
            var authid = '{{Auth::user()->id}}';
            if (authid == user_id) {
                alert('El cambio de rol no es permitido para Usted...');
            } else {
                $.get('/admin/usuarios/' + user_id + '/edit', function(data) {

                    $('#title2').html("Cambiar rol del usuario");
                    $('#btn-save2').val("Editar");
                    $('#my-modal2').modal('show');
                    $('#id2').val(data.id);
                    $('#name123').html(data.username);
                    //alert(data.id);
                })
            }

        });
        //Actualizar
        $(".btn-submit2").click(function(e) {

            e.preventDefault();
            var actionType = $('#btn-save2').val();
            $('#btn-save2').html('Enviando..');
            var rol = $('input[name="rol2"]:checked').val();
            var id = $("#id2").val();
            $.ajax({
                url: "{{ route('admin.updateuser')}}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    rol: rol,
                    id: id
                },
                success: function(data) {
                    //alert(data.success);
                    if ($.isEmptyObject(data.error)) {
                        //alert(data.success);

                        $('#my-modal2').modal('hide');
                        //$('#userForm').trigger("reset");
                        $('#btn-save2').html('Guardar cambios');

                        $(".print-success-msg").find("ul").html(data.success);
                        $(".print-success-msg").css('display', 'block');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);

                    } else {
                        //printErrorMsg(data.error);
                    }
                }
            });

        });
        //Eliminar un registro
        $('body').on('click', '#delete-user', function() {
            var user_id = $(this).data("id");
            
            if (confirm("Usted va elimnar este usuario !")) {
                $.ajax({
                    type: "get",
                    url: "usuarios/delete/" + user_id,
                    success: function(data) {
                        if (data.warning) {
                            $(".print-warning-msg").find("ul").html(data.warning);
                            $(".print-warning-msg").css('display', 'block');
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            $(".print-success-msg").find("ul").html(data.success);
                            $(".print-success-msg").css('display', 'block');
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }

                        //alert(data.success);
                    },
                    error: function(data) {
                        alert('Error:', data);
                    }
                });
            }
        });
        $(".btn-submit").click(function(e) {

            e.preventDefault();

            //alert("dsdf");
            e.preventDefault();
            var actionType = $('#btn-save').val();
            $('#btn-save').html('Enviando..');
            //var formData = new FormData(this);
            var name = $("#name").val();
            var lastname = $("#lastname").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var email = $("#email").val();
            var rol = $('input[name="rol"]:checked').val();

            $.ajax({
                url: "{{ route('admin.usuarios.store') }}",
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    name: name,
                    lastname: lastname,
                    username: username,
                    password: password,
                    confirm_password: confirm_password,
                    email: email,
                    rol: rol,
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        //alert(data.success);

                        $('#my-modal').modal('hide');
                        $('#userForm').trigger("reset");
                        $('#btn-save').html('Guardar cambios');

                        $(".print-success-msg").find("ul").html(data.success);
                        $(".print-success-msg").css('display', 'block');
                        setTimeout(function() {
                            location.reload();
                        }, 3000);

                    } else {
                        printErrorMsg(data.error);
                    }
                }
            });

        });

        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }


    });

    //validar password
    $('#password, #confirm_password').on('keyup', function() {
        if ($('#password').val() == '') {
            $('#message').html('Sin datos').css('color', 'white');
            $('#confirm_password').css("border-color", "red");
        } else if ($('#confirm_password').val() == $('input[name="password"]').val() && $('#confirm_password').val().length > 5) {
            //$('#confirm_password').css( 'border-color','green');

            //$('#confirm_password').css("border-color", "green");
            //element.classList.remove("borderRed");
            var element = document.getElementById('confirm_password');
            // element.style.removeAttribute("border");
            element.style.border = "";
            var element = document.getElementById('confirm_password');
            element.style.border = "2px solid green";

            $('#message').html('Correcto').css('color', 'green');

        } else {
            $('#message').html('Las contraseñas no coinciden o es menor a 5 caracteres').css('color', 'red');
            $('#confirm_password').css("border-color", "red");
        }

    });

    function forceLower(strInput) {
        strInput.value = strInput.value.toLowerCase();
    }
</script>

@stop