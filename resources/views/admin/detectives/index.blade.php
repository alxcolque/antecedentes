@extends('adminlte::page')

@section('title', 'FELCC')
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')
<!-- Tablas de detectives -->

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
                                    <th>Acciones</th>
                                    <th>nombres</th>
                                    <th>Creado En</th>
                                    <th>Actualizado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Detecti as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{ $row->id }}" data-original-title="Edit" class="edit btn btn-dark btn-sm edit-user">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>

                                        <td>{{$row->nombres}}</td>
                                        <td>{{$row->created_at}}</td>
                                        <td>{{$row->updated_at}}</td>
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
                                    <form id="userForm" name="userForm" class="form-horizontal" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-group row">
                                            <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nombreusuario" class="col-sm-2 col-form-label">Usuario</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nombreusuario" id="nombreusuario" placeholder="Nombre de usuario">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="password" id="password" placeholder="Contraseña">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Confirmar</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="password" id="password" placeholder="Contraseña">
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
                                                <label class="form-check-label">Moderador</label>
                                            </div>
                                            <div class="form-check col-sm-3">
                                                <input class="form-check-input" type="radio" name="rol" checked="" value="3">
                                                <label class="form-check-label">Usuario Comun</label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label">Foto</label>
                                            <div class="col-sm-4">
                                                <input id="foto" type="file" name="foto" accept="image/*" onchange="readURL(this);">
                                                <input type="hidden" name="hidden_image" id="hidden_image">
                                            </div>
                                        </div>
                                        <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Guardar Cambios
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>



@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('js')<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<script>
        var SITEURL = "{{URL::to('')}}";
        $(document).ready(function() {
            //alert("alet");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
                $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
            });
            /* When click edit user */
            $('body').on('click', '.edit-user', function() {
                var user_id = $(this).data('id');
                $.get('usuarios/' + user_id + '/edit', function(data) {

                    $('#title').html("Editar Usuario");
                    $('#btn-save').val("edit-user");
                    $('#my-modal').modal('show');
                    $('#id').val(data.id);
                    $('#nombres').val(data.nombres);
                    $('#apellidos').val(data.apellidos);
                    $('#nombreusuario').val(data.nombreusuario);
                    $('#email').val(data.email);
                    $('#password').val(data.password);
                    $('#foto').val(data.foto);
                    $('#modal-preview').attr('alt', 'No image available');
                    if (data.foto) {
                        $('#modal-preview').attr('src', SITEURL + 'public/user/' + data.foto);
                        $('#hidden_image').attr('src', SITEURL + 'public/user/' + data.foto);
                    }
                })
            });
            //Eliminar un registro
            $('body').on('click', '#delete-user', function() {
                var user_id = $(this).data("id");
                if (confirm("Usted va elimnar !")) {
                    $.ajax({
                        type: "get",
                        url: "usuarios/delete/" + user_id,
                        success: function(data) {
                            var oTable = $('#laravel_datatable').dataTable();
                            oTable.fnDraw(false);
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
        $('body').on('submit', '#userForm', function(e) {
            alert("dsdf");
            e.preventDefault();
            var actionType = $('#btn-save').val();
            $('#btn-save').html('Sending..');
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: SITEURL + "/admin/usuarios/store",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#userForm').trigger("reset");
                    $('#my-modal').modal('hide');
                    $('#btn-save').html('Save Changes');
                    var oTable = $('#laravel_datatable').dataTable();
                    oTable.fnDraw(false);
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#btn-save').html('Save Changes');
                }
            });
        });

        function readURL(input, id) {
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
        }
    </script>
@stop