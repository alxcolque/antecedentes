@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h1>Caruseles </h1>
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
        <a class="btn btn-success" href="{{route('admin.carruseles.create')}}"><i class="fas fa-fw fa-plus"></i> Nuevo</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div id="demo" class="carousel slide" data-ride="carousel">


            <!-- Indicators -->
            <ul class="carousel-indicators">
                @foreach ($carruseles as $row)
                <li data-target="#demo" data-slide-to="$row->id" class="{{ $loop->first ? 'active' : '' }}"></li>

                @endforeach
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                @foreach ($carruseles as $row)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset ('/storage/carruseles/'.$row->image)}}" alt="{{ $row->image }}" width="1100" height="500">
                    <rect width="100%" height="100%" fill="#777" />
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>{{$row->title}}.</h1>
                            <p>{{$row->description}}.</p>
                            <a class="btn btn-primary btn-sm" href="{{route('admin.carruseles.edit', $row->id)}}"><i class="fas fa-fw fa-edit"></i>Editar</a>
                            <form action="{{route('admin.carruseles.destroy', $row->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('¿Seguro que quiere eliminar este registro?')" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i>Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
@stop