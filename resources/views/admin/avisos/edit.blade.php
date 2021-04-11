@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')

@stop

@section('content')
<div class="card">

    <div class="card-body">
        {!! Form::model($aviso, ['route'=>['admin.avisos.update', $aviso], 'method'=>'put'])!!}
        <div class="form-group">
            {!! Form::label('titulo', 'Titulo') !!}
            {!! Form::text('titulo', null, ['class'=>'form-control','placeholder'=>'Ingrese el titulo del post']) !!}

            @error('titulo')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('file','Imagen que se muestra en el post') !!}
            {!! Form::file('file',['class'=>'form-control-file','accept'=>'.jpg, .jpeg, .png,']) !!}
            @error('file')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion') !!}
            {!! Form::text('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion breve']) !!}

            @error('descripcion')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        {!! Form::submit('Actualizar aviso',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
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