@extends('layouts.layout')

@section('content'){{-- edit --}}

<div class="row bg-light">
  <div class="col-md-10 offset-md-1 my-5">{{-- centro el formulario --}}
    <h2 class="colorLogo">Edición de Película</h2>
    <form class="row g-3" action="{{route('peliculas.update',$peliculas->id)}}" enctype="multipart/form-data" method="POST">{{-- $peliculas->id --}}
      @method('PUT')
      {{ csrf_field() }}
        
      <div class="col-md-4 ">  
        <input type="text" class="form-control @error('titol') is-invalid @enderror" id="titol" name="titol" value="{{ old('titol') ? : $peliculas->titol }}" placeholder="Títol">
        <label for="titol">
        @error('titol')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </label>
      </div>

      <div class="col-md-4 ">  
        <input type="text" class="form-control @error('duracio') is-invalid @enderror" name="duracio" id="duracio" value="{{ old('duracio') ? : $peliculas->duracio }}" placeholder="Duració">
        <label for="duracio">
          @error('duracio')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </label>
      </div>

      <div class="col-md-4 ">  
        <input type="text" class="form-control @error('productora') is-invalid @enderror" name="productora" id="productora" value="{{ old('productora') ? : $peliculas->productora }}" placeholder="Productora">
        <label for="productora">
          @error('productora')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </label>
      </div>
      
      <div class="col-md-6 ">  
      <select class="form-select @error('categoria') is-invalid @enderror" aria-label="Default select example" name="categoria" id="categoria" value="">{{-- {{ $categorias->nom }} --}}
        <option selected>Escoge una categoría</option>
        
        @foreach ($categorias as $cat)

        <option value="{{ $cat->id }}" {{(old('categoria') == $cat->id) ? "selected" : (($peliculas->id_categoria == $cat->id)?"selected":"")}} >{{ $cat->nom}}</option>  

        @endforeach
        
      </select>
      <label for="categoria">
        @error('categoria')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </label>
      </div>
      <div class="col-md-6 ">  
        <input type="text" class="form-control @error('director') is-invalid @enderror" name="director" id="director" value="{{ old('director') ? : $director->nom }}" placeholder="Director">
        <label for="director">
          @error('director')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </label>
      </div>
      
      <div class="col-md-6 ">
        <label for="imatge1" class="text-secondary">Selecciona la imagen de la carátula
          <input type="file" name="imatge1" id="imatge1" class="form-control mt-2 text-secondary @error('imatge1') is-invalid @enderror" value="{{ old('imatge1') ? : asset('fotos/'.$peliculas->ruta_imatge1) }}"  aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
          @error('imatge1')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="col-md-6 ">
        <label for="imatge2" class="text-secondary">Selecciona la imagen 1
          <input type="file" value="{{ old('imatge2') ? : asset('fotos/'.$peliculas->ruta_imatge2) }}" name="imatge2" id="imatge2" class="form-control mt-2 text-secondary @error('imatge2') is-invalid @enderror"  aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
          @error('imatge2')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>
      {{-- IMAGENES --}}

      <div class="col-md-6">
        <div class="card bg-dark">
          <div class="card-body">
            <img class="img-fluid rounded" src="{{asset('fotos/'.$peliculas->ruta_imatge1)}}" alt="" srcset="">  {{-- ? : asset('fotos/'.$peliculas->ruta_imatge1) --}}
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card bg-dark">
          <div class="card-body">
            <img class="img-fluid rounded" src="{{asset('fotos/'.$peliculas->ruta_imatge2)}}" alt="" srcset="">  
          </div>
        </div>
      </div>

      <div class="col-md-6 ">
        <label for="imatge3" class="text-secondary">Selecciona la imagen 2
          <input type="file" name="imatge3" id="imatge3" value="{{ old('imatge3') ? : $peliculas->ruta_imatge3 }}" class="form-control mt-2 text-secondary @error('imatge3') is-invalid @enderror"  aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
          @error('imatge3')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>
      <div class="col-md-6 ">
        <label for="video" class="text-secondary @error('video') is-invalid @enderror">Selecciona el video
          <input type="file" name="video" id="video" value="{{ old('video') ? : $peliculas->ruta_video }}" class="form-control mt-2 text-secondary" aria-describedby="inputGroupFileAddon04" aria-label="Upload" {{ $peliculas->ruta_video }}>
          @error('video')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>

      {{-- IMAGENES --}}

      <div class="col-md-6">
        <div class="card bg-dark">
          <div class="card-body">
            <img class="img-fluid rounded" src="{{asset('fotos/'.$peliculas->ruta_imatge3)}}" alt="" srcset="">  
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card bg-dark">
          <div class="card-body">
            <video width="100%" height="" poster="{{asset('fotos/'.$peliculas->ruta_imatge3)}}" controls>
              <source src="{{asset('fotos/'.$peliculas->ruta_video)}}" type="video/mp4">
              <source src="movie.ogg" type="video/ogg">
            Tu navegador no soporta la etiqueta video.
            </video>
          </div>
        </div>
      </div>

      <div class="col-md-6 form-group">
      <label for="descripcio" class="text-secondary">Introduce la sinopsis de la película</label>
      <textarea class="form-control mt-2 @error('descripcio') is-invalid @enderror" name="descripcio" id="descripcio" value="{{ old('descripcio') ? : $peliculas->descripcio }}" rows="3">{{ $peliculas->descripcio }}</textarea>
      @error('descripcio')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

      <div class="col-12">
        
        <a href="{{route('peliculas.index')}}" class="btn btn-secondary">Volver</a>
        <button class="btn btn-film1" type="submit"><b>Enviar</b></button>
      </div>
    </form>
  </div>
</div>  
@stop
      
