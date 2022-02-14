@extends('layouts.layout')

@section('content')

<div id="carouselExampleFade" class="carousel slide carousel-fade text-center" data-bs-ride="carousel">
  
  <div class="carousel-inner">
    
    <div class="carousel-item active" data-bs-interval="4000">
      <img src="{{asset('fotos/'.$pelicula->ruta_imatge2)}}" class="rounded d-block w-100" alt="...">     
      <div class="carousel-caption d-none d-md-block">
        <h1><span class="badge colorBadgeTitol text-white">{{$pelicula->titol}} <i class="fas fa-play-circle"></i></span></h1>    
      </div>
      <a href="{{route('reproducirPelicula',$pelicula->id)}}" class="stretched-link"></a>
    </div>
    <div class="carousel-item" data-bs-interval="4000">
      <img src="{{asset('fotos/'.$pelicula->ruta_imatge3)}}" class="rounded d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1><span class="badge colorBadgeTitol text-white">{{$pelicula->titol}} <i class="fas fa-play-circle"></i></span></h1>
      </div>
      <a href="{{route('reproducirPelicula',$pelicula->id)}}" class="stretched-link"></a>  
    </div> 
  </div>
</div>

<div class="row">
  <div class="text-white lead mb-3 ps-5 fs-2 pt-4 font-weight-bold">Sinopsis</div>

  <div class="col-sm-6 col-md-6 col-lg-6">
    <div class="card verPeliculaBgColor">
      <div class="card-body lead">
        <div class="text-white rounded p-3 fs-5">
          {{$pelicula->descripcio}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-6 col-lg-6">
    <div class="card verPeliculaBgColor">
      <div class="card-body lead">
        <div class="text-white rounded border-3 p-3 fs-5" id="art">
          <span class="colorLogo">Título:</span> {{$pelicula->titol}}
          <br>
          <span class="colorLogo">Director:</span> {{$director}}
          <br>
          <span class="colorLogo">Duración</span> {{$pelicula->duracio}} <span>minutos</span>
          <br>
          <span class="colorLogo">Productora</span> {{$pelicula->productora}}
        </div>
      </div>
    </div>
  </div>
<div>  
  @endsection

      