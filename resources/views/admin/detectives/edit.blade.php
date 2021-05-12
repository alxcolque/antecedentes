@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
<h4>Editar Personal Policial</h4>

@stop

@section('content')
<div class="card">

    <div class="card-body">

        <form class="form-horizontal" action="{{ route('admin.detectives.update',$detective->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row bg-light text-dark">

                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label for="nombres">Nombre Completo</label>
                        <input class="form-control" value="{{$detective->nombres}}" placeholder="Ingrese el nombres del post" name="nombres" type="text" id="nombres" required onkeyup="this.value = this.value.toUpperCase();">
                    </div>
                    @error('nombres')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    

                    <div class="form-group ">
                        <div class="">
                            <button type="submit" class="btn btn-success ">Actualizar</button>
                        </div>
                    </div>

                </div>
            </div>
            
        </form>


    </div>

    <!-- /.card-body -->
</div>
<!-- /.card -->
<!-- Fin contenido -->

@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
<link rel="stylesheet" href="/css/app.css">

@stop

@section('js')
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@stop