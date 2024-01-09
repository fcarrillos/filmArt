@extends('layouts.layout')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="{{route('infoPelicula',$pelicula0->id)}}" class="stretched-link"></a>
        <img src="{{'fotos/'.$pelicula0->ruta_imatge1}}" class="rounded d-block w-100" alt="..."> 
        
        <div class="carousel-caption d-none d-md-block"> 
          <h5>{{-- First slide label --}}</h5>
          <p>{{-- Some representative placeholder content for the first slide. --}}</p>
        </div>
        
      </div>
      <div class="carousel-item">
        <a href="{{route('infoPelicula',$pelicula1->id)}}" class="stretched-link"></a>
        <img src="{{'fotos/'.$pelicula1->ruta_imatge1}}" class="rounded d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{-- Second slide label --}}</h5>
          <p>{{-- Some representative placeholder content for the second slide. --}}</p>
        </div>
      </div>
      <div class="carousel-item">
        <a href="{{route('infoPelicula',$pelicula2->id)}}" class="stretched-link"></a>
        <img src="{{'fotos/'.$pelicula2->ruta_imatge1}}" class="rounded d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{-- Third slide label --}}</h5>
          <p>{{-- Some representative placeholder content for the third slide. --}}</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- **** HR SEPARADOR **** --}}
<div class="row">
    <hr>
</div>


<div class="text-white lead mb-3 ps-5 fs-2 pt-4 font-weight-bold">Catálogo</div>
  @foreach( $peliculas as $pelicula)
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card bg-dark">
      
        <div class="card-body efectoHover">
          <a href="{{route('infoPelicula',$pelicula->id)}}" class="stretched-link">
          <img class="img-fluid rounded" src="{{'/fotos/'.$pelicula->ruta_imatge1}}" alt="" srcset="">  
          <div class="descripcion">{{ \Str::limit($pelicula->descripcio, 75) }}</div>
          <span class="badge colorBadgeTitol text-white lead fs-6 mt-2">{{$pelicula->titol}}</span>
          <span class="badge btn-film1 text-dark lead fs-6 mt-1">{{$pelicula->duracio. ' min'}}</span>
        </a>  
          
        </div>
      
    </div>
  </div>
  @endforeach
  

  
</div>
  
@stop

