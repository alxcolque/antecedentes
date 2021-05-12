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
        @foreach ($advices as $row)
        <hr class="featurette-divider">
        @if($row->id % 2 == 0)
        <div class="row featurette">

            <div class="col-md-1">
                <a class="btn btn-secondary btn-sm" href="{{route('admin.avisos.edit', $row->id)}}"><i class="fas fa-fw fa-edit"></i></a>
                <form action="{{route('admin.avisos.destroy', $row->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>
                </form>
            </div>
            <div class="col-md-7">
                <h2 class="featurette-heading text-center">{{$row->titulo}}</h2> <span class="text-muted">{{$row->created_at}}</span>
                <p class="lead">{{$row->descripcion}}</p>
            </div>
            <div class="col-md-4">
                <img class="rounded-circle" src="{{ asset ('/storage/avisos/'.$row->imagen)}}" alt="" height="200">

            </div>
        </div>
        @else
        <div class="row featurette">
            <div class="col-md-1 order-md-1">
                <a class="btn btn-secondary btn-sm" href="{{route('admin.avisos.edit', $row->id)}}"><i class="fas fa-fw fa-edit"></i></a>
                <form action="{{route('admin.avisos.destroy', $row->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></button>
                </form>
            </div>
            <div class="col-md-7 order-md-3">

                <h2 class="featurette-heading text-center">{{$row->titulo}}</h2>
                <span class="text-muted">{{$row->created_at}}</span>
                <p class="lead">{{$row->descripcion}}</p>
            </div>
            <div class="col-md-4 order-md-2">
                <img class="rounded-circle" src="{{ asset ('/storage/avisos/'.$row->imagen)}}" alt="" height="200">

            </div>
        </div>
        @endif
        @endforeach

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