@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')

@stop

@section('content')
<div class="card">

    <div class="card-body">
        {!! Form::open(['route'=>'admin.avisos.store', 'autocomplete'=>'off','files'=>true])!!}
        <div class="form-group">
            {!! Form::label('titulo', 'Titulo') !!}
            {!! Form::text('titulo', null, ['class'=>'form-control','placeholder'=>'Ingrese el titulo del post']) !!}

            @error('titulo')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="row mb-3">

            <div class="col">
                <div class="form-group">
                    {!! Form::label('file','Imagen que se muestra en el post') !!}
                    {!! Form::file('file',['class'=>'form-control-file','accept'=>'.jpg, .jpeg, .png,']) !!}
                    @error('file')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="image-wrapper">
                    <img id="picture" src="https://images.unsplash.com/photo-1542261777448-23d2a287091c?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTR8fHxlbnwwfHx8&auto=format&fit=crop&w=500&q=60" alt="df">
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('descripcion', 'Descripcion') !!}
            {!! Form::textarea('descripcion', null, ['class'=>'form-control','placeholder'=>'Descripcion breve']) !!}

            @error('descripcion')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        {!! Form::submit('Crear aviso',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">
<style>
    .image-wrapper {
        position: relative;
        padding-bottom: 56.25%º;
    }

    .image-wrapper img {
        /*position: absolute;*/
        object-fit: cover;
        width: 200px;
        height: 200px;
    }
</style>
@stop

@section('js')
<script>
    //Cambiar imagen
    document.getElementById("file").addEventListener('change', cambiarImagen);

    function cambiarImagen(event) {
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById("picture").setAttribute('src', event.target.result);
        };

        reader.readAsDataURL(file);
    }
</script>
@stop