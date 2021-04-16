@extends('adminlte::page')

@section('title', 'FELCC')

@section('content_header')
    <h1>Inicio</h1>
@stop

@section('content')

    <p>Lista de nuestro personal policial</p>
  <table class="table table-light">
      <thead class="thead-light">
          <tr>
              <th>ID</th>
              <th>Nombres</th>
              <th>Creado En</th>
              <th>Actualizado En</th>
              <th>acciones</th>
          </tr>
      </thead>
      <tbody>
      @foreach($detective as $detectives)
          <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$detectives->nombres}}</td>
              <td>{{$detectives->created_at}}</td>
              <td>{{$detectives->updated_at}}</td>
              <td>Editar|

              <form action="{{url('admin/detectives/'.$detectives->id)}}" method="post">
              @csrf
              {{method_field('DELETE')}}
              <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
              </form>
              
              </td>
      

          </tr>
      @endforeach
      </tbody>
  </table>

@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css">  -->
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
