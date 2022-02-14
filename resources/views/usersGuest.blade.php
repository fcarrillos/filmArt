@extends('layouts.layout')

@section('content')

<div class="card bg-dark text-white">
  <img src="{{asset('fotos/bgGuest.jpg')}}" class="card-img" alt="...">
  <div class="card-img-overlay">
    <div class="container-fluid pt-5">{{-- py-5 --}}
      <h1 class="display-5 fw-bold colorTextGuest text-white text-center">Acceso restringido</h1>
      <h4 class="fs-4 text-center fw-bold colorLogo pb-2">Date de alta y comienza a disfruta del cine independiente desde hoy mismo.</h4>
    </div>
    {{-- <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p> --}}
  </div>
</div>

{{-- <div class="row bg-light">
  <div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">Custom jumbotron</h1>
      <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
      <button class="btn btn-primary btn-lg" type="button">Example button</button>
    </div>
  </div>
</div>   --}}
@stop
      
