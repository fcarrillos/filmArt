@extends('layouts.layout')

@section('content')

<div class="row">
  <div class="col-md-4 text-white lead mb-3 ps-5 fs-2 pt-4 font-weight-bold">Filtrar por Categorías</div>

<div class="col-md-4 offset-md-4 mb-1 ps-5 fs-2 pt-4">  
  <select class="text-white bg-dark form-select @error('categoria') is-invalid @enderror" aria-label="Default select example" name="categoria" id="categoria" value="">
    <option selected>Filtrar por Categoría</option>
    
    @foreach ($categorias as $categoria)
      <option value="{{$categoria->id}}" >{{$categoria->nom}}</option>  
    @endforeach
    
  </select>
  <label for="categoria">
    @error('categoria')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </label>
  </div>
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

{{-- Pasa la ruta con el id seleccionado de la categoría --}}
<script>
  $(document).ready(function(){
    const url = "{{ route('categorias',':categoria')}}"
    $('#categoria').change(function(){
    finalurl = url.replace(':categoria',$(this).val());
    window.location = finalurl;
    console.log("finalURL",finalurl);
    
    });
  });  
</script>

@stop