@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')

<!-- Tablas de antecedentes mas reciente -->

<div class="section">
    <div class="card">
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="laravel_datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>CI</th>
                                    <th>Nacido en:</th>
                                    <th>Nacionalidad</th>
                                   
                                 

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($people as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    
                                    <td>{{$row->arrestado}}</td>
                                    <td>{{$row->ci}}</td>
                                    <td>{{$row->nacido}}</td>
                                    <td>{{$row->nacionalidad}}</td>
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



@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
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