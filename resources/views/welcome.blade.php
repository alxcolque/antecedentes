@extends('layouts.app')
@section('content')
<div class="card">
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
                            <p><a class="btn btn-lg btn-primary" href="{{route('login')}}">Iniciar Sesión</a></p>
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
</div>


<!-- 
  ================================================== -->

<div class="container marketing mt-1">

    <!-- START THE FEATURETTES -->
    @foreach ($advices as $row)
    <hr class="featurette-divider">
    @if($row->id % 2 == 0)
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading text-center">{{$row->titulo}}</h2> <span class="text-muted">{{$row->created_at}}</span>
            <p class="lead">{{$row->descripcion}}</p>
        </div>
        <div class="col-md-5">
            <img class="rounded-circle" src="{{ asset ('/storage/avisos/'.$row->imagen)}}" alt="" height="200">

        </div>
    </div>
    @else
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading text-center">{{$row->titulo}}</h2>
            <span class="text-muted">{{$row->created_at}}</span>
            <p class="lead">{{$row->descripcion}}</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img class="rounded-circle" src="{{ asset ('/storage/avisos/'.$row->imagen)}}" alt="" height="200">

        </div>
    </div>
    @endif
    @endforeach
    <hr class="featurette-divider">

</div><!-- /.container -->

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>