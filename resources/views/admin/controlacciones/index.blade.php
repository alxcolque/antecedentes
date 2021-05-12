@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h4>Acciones que ocurren en el Sistema</h4>
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
            <a href="limpiarbitacora" id="limpiarpdf" onclick="return confirm('¿Seguro que quiere limpiar la tabla?')" class="pull-right btn btn-secondary btm-sm"><i class="fas fa-trash"></i> Limpiar todas las acciones</a>
            <!-- <a href="/importfile" class="pull-right btn btn-success"><i class="fas fa-file-import"></i> Import</a> -->
        </div><br>
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="mitable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Accion</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($actions as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->usuario}}</td>
                                    <td>{{$row->accion}}</td>
                                    <td>{{$row->fecha}}</td>
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
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<!-- Para generar pdf excel y csv -->
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.css" rel="stylesheet" />
@stop

@section('js')
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
<!-- Para generar pdf excel y csv -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#mitable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdf',
                title: 'Informacion en PDF',
                filename: 'Bitácora'
            }, {
                extend: 'excel',
                title: 'Informacion en EXCEL',
                filename: 'Bitácora'
            }, {
                extend: 'csv',
                filename: 'Bitácora'
            }]
        });
        /*var table = $("#mitable").DataTable({
            ordering: true
        });*/

        /*new $.fn.dataTable.Buttons(table, {
                buttons: [{
                    extend: 'pdfHtml5',
                    text: 'Abrir en PDF',
                    download: 'open',
                    className: 'btn-danger',
                    messageTop: 'Copia de seguridad de bitácora',
                    title: 'Acciones',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    },
                    customize: function(doc) {
                        doc.styles.title = {
                            color: 'red',
                            fontSize: '40',
                            alignment: 'center'
                        }
                        doc.styles['td:nth-child(2)'] = {
                            width: '100px',
                            'max-width': '100px'
                        }
                    }
                }, ],
            });

            table.buttons(0, null).container().appendTo(
                table.table().container()
            );*/
    });
</script>
@stop