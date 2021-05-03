@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')
<p>registro de importaciones de archivos excel</p>
<div class="content-fluid">
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <table id="laravel_datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Usuario</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($imports as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->fechaimport}}</td>
                                <td>{{$row->user_id}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop