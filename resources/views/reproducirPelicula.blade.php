@extends('layouts.layout')

@section('content')

<video width="100%" height="" poster="{{asset('fotos/'.$pelicula->ruta_imatge3)}}" controls>
    <source src="{{asset('fotos/'.$pelicula->ruta_video)}}" type="video/mp4">
    <source src="movie.ogg" type="video/ogg">
   El navegador no soportala reproducción de video.
  </video> 


  @endsection