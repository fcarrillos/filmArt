
{{-- @extends('layouts.layout') --}}

{{-- @section('content') --}}{{-- listarPeliculas --}}

<div class="text-white lead mb-3 ps-5 fs-2 pt-4 font-weight-bold">Catálogo</div>
  @foreach( $peliculas as $pelicula)
  <div class="col-sm-6 col-md-4 col-lg-3">
    <div class="card bg-dark">
      <div class="card-body efectoHover">
        <a href="{{route('infoPelicula',$pelicula->id)}}" class="stretched-link">
          <img class="img-fluid rounded" src="{{'/fotos/'.$pelicula->ruta_imatge2}}" alt="" srcset="">  
          <div class="descripcion">{{ \Str::limit($pelicula->descripcio, 75) }}</div>
          <span class="badge colorBadgeTitol text-white lead fs-6 mt-2">{{$pelicula->titol}}</span>
          <span class="badge btn-film1 text-dark lead fs-6 mt-1">{{$pelicula->duracio. ' min'}}</span>
        </a>     
      </div>
    </div>
  </div>
  @endforeach
  
</div>

{{-- @stop --}}
      


