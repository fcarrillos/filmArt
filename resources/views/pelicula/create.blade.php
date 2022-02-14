@extends('layouts.layout')

@section('content'){{-- create --}}

<div class="row bg-light">
  <div class="col-md-10 offset-md-1 my-5">{{-- centro el formulario --}}
    <h2 class="colorLogo">Administración de películas</h2>
    <form class="row g-3" action="{{route('peliculas.store')}}" enctype="multipart/form-data" method="POST">
      {{ csrf_field() }}
      
      <div class="col-md-4 ">  
        <input type="text" class="form-control @error('titol') is-invalid @enderror" id="titol" name="titol" value="{{ old('titol') }}" placeholder="Título">
        <label for="titol">
        @error('titol')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </label>
      </div>

      <div class="col-md-4 ">  
        <input type="text" class="form-control @error('duracio') is-invalid @enderror" name="duracio" id="duracio" value="{{ old('duracio') }}" placeholder="Duración">
        <label for="duracio">
          @error('duracio')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </label>
      </div>

      <div class="col-md-4 ">  
        <input type="text" class="form-control @error('productora') is-invalid @enderror" name="productora" id="productora" value="{{ old('productora') }}" placeholder="Productora">
        <label for="productora">
          @error('productora')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </label>
      </div>

      <div class="col-md-6 ">  
        <select class="form-select @error('categoria') is-invalid @enderror" aria-label="Default select example" name="categoria" id="categoria" value="{{ old('categoria') }}">
          <option selected>Escoge una categoría</option>
          
          @foreach ($categorias as $cat)
            <option value="{{$cat->id}}" {{(old('categoria') == $cat->id) ? "selected" : ""}}>{{$cat->nom}} </option>  
          @endforeach
          
        </select>
        <label for="categoria">
          @error('categoria')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>
      <div class="col-md-6 ">  
        <input type="text" class="form-control @error('director') is-invalid @enderror" name="director" id="director" value="{{ old('director') }}" placeholder="Director">
        <label for="director">
          @error('director')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </label>
      </div>  
      
      <div class="col-md-6 ">
        <label for="imatge1" class="text-secondary">Selecciona la imagen de la carátula
          <input type="file" name="imatge1" id="imatge1" class="form-control mt-2 text-secondary @error('imatge1') is-invalid @enderror" value="{{ old('imatge1') }}"  aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
          @error('imatge1')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="col-md-6 ">
        <label for="imatge2" class="text-secondary">Selecciona la imagen 1
          <input type="file" value="{{old('imatge2')}}" name="imatge2" id="imatge2" class="form-control mt-2 text-secondary @error('imatge2') is-invalid @enderror"  aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
          @error('imatge2')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="col-md-6 ">
        <label for="imatge3" class="text-secondary">Selecciona la imagen 2
          <input type="file" name="imatge3" id="imatge3" value="{{ old('imatge3') }}" class="form-control mt-2 text-secondary @error('imatge3') is-invalid @enderror"  aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
          @error('imatge3')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="col-md-6 ">
        <label for="video" class="text-secondary @error('video') is-invalid @enderror">Selecciona el video
          <input type="file" name="video" id="video" value="{{ old('video') }}" class="form-control mt-2 text-secondary" aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
          @error('video')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </label>
      </div>

      <div class="col-md-6 form-group">
      <label for="descripcio" class="text-secondary">Introduce la sinopsis de la película</label>
      <textarea class="form-control mt-2 @error('descripcio') is-invalid @enderror" name="descripcio" id="descripcio" value="" rows="3">{{ old('descripcio') }}</textarea>
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
      
