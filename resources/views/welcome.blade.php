@extends('layouts.app')
@section('content')

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/carrusel/car2.jpg" alt="Los Angeles" width="1100" height="500">
      <rect width="100%" height="100%" fill="#777" />
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Imagen F.</h1>
                    <p>La mejor manera de vivir es ayudando y apoyando al pueblo.</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                </div>
            </div>
    </div>
    <div class="carousel-item">
      <img src="images/carrusel/car1.jpeg" alt="Chicago" width="1100" height="500">
      <rect width="100%" height="100%" fill="#777" />
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Imagen F.</h1>
                    <p>La mejor manera de vivir es ayudando y apoyando al pueblo.</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                </div>
            </div>
    </div>
    <div class="carousel-item">
      <img src="images/carrusel/car3.jpg" alt="New York" width="1100" height="500">
      <rect width="100%" height="100%" fill="#777" />
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1>Imagen F.</h1>
                    <p>La mejor manera de vivir es ayudando y apoyando al pueblo.</p>
                    <!-- <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p> -->
                </div>
            </div>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<!-- Marketing messaging and featurettes
  ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing mt-1">

    <!-- Three columns of text below the carousel -->
    <!-- <div class="row">
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
            </svg>

            <h2>Heading</h2>
            <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
            <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
            </svg>

            <h2>Heading</h2>
            <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
            <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
            </svg>

            <h2>Heading</h2>
            <p>And lastly this, the third column of representative placeholder content.</p>
            <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
        </div>
    </div> -->


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

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
@endsection