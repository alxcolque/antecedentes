@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Avisos </h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Hey!</strong> {{session('info')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="card">

    <div class="card-header">
        <a class="btn btn-success" href="{{route('admin.avisos.create')}}"><i class="fas fa-fw fa-plus"></i> Nuevo</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($advices as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->titulo}}</td>
                    <td><img src="{{asset('/storage/'.$row->imagen)}}" alt="" height="50"></td>
                    <td>{{$row->descripcion}}</td>
                    <td class=" row">
                        <a class="btn btn-secondary btn-sm" href="{{route('admin.avisos.edit', $row->id)}}"><i class="fas fa-fw fa-edit"></i></a>
                        <form action="{{route('admin.avisos.destroy', $row->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
<script>

</script>
@stop