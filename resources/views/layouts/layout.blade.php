<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html">
    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('bootstrap-5/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/filmart.css')}}">
    <!-- <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script> -->
    <script src="{{asset('fonts/fontawesome/js/all.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>  

    <title>Film Art</title>
    @livewireStyles
  </head>
  <body class="bg-dark">
    

    <div class="container-fluid bg-dark">
        {{-- NAVBAR --}}
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{route('inicio')}}"><span id="logo" class="fas fa-2x fa-film"></span>  <span id="film">FILM</span>  <span id="art">ART</span></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" >{{-- style="--bs-scroll-height: 100px; --}}
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pelicula') }}">Películas</a>
                        {{-- <a class="nav-link" href="{{ url('listarPeliculas') }}">Películas</a> --}}
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('categorias') }}">Categorías</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Más
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                          {{-- <li><a class="dropdown-item" href="#">Festivales</a></li>
                          <li><a class="dropdown-item" href="#">Últimas subidas</a></li>
                          <li><hr class="dropdown-divider"></li> --}}
                          <li><a class="dropdown-item" href="{{url('sobreNosotros')}}">Sobre Nosotros</a></li>
                          <li><a class="dropdown-item" href="{{ url('contacta') }}">Contacta</a></li>
                        </ul>
                      </li>
                     </ul> 
                    
                    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" >{{-- style="--bs-scroll-height: 100px; --}}
                      @if (Route::has('login'))
                {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                        @auth
                          @if (Auth::user()->is_editor || Auth::user()->is_admin)
                          <li class="nav-item text-sm">{{-- text-white --}}
                            <a class="nav-link" href="{{ route('peliculas.index') }}" class="text-sm text-gray-700 underline">Panel Edición</a>
                          </li>
                          @endif
                        <li class="nav-item text-sm">{{-- text-white --}}
                            <a class="nav-link" href="" class="text-sm text-gray-700 underline">{{ Auth::user()->name }}</a> {{-- {{ url('/perfilUsuario') }} --}}
                        </li>
                        
                          <!-- Authentication -->
                           
                          <form class="d-flex" method="POST" action="{{ route('logout') }}">
                            @csrf
                              <a class="nav-link" onclick="event.preventDefault();
                              this.closest('form').submit();" href="{{ route('logout') }}" class="text-sm text-gray-700 underline">Salir</a>                    
                          </form>
                        
                    
                      @else
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 underline">Entra</a>
                      </li>      
                          @if (Route::has('register'))
                          <li class="nav-item">    
                              <a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Suscríbete</a>
                          </li>
                          @endif
                      @endauth
                  
                      @endif
                      <li class="nav-item">    
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#ModalBuscar" data-bs-whatever="@mdo" href=""><i class="fas fa-2x fa-search colorLogo"></i></a>
                        
                      </li> 
                    </ul>
                  </div>
                </div>
            </nav>

        {{-- **** Contenido de las vistas **** --}}
          @yield('content')
          {{-- @livewire('peliculas')   --}}
        {{-- **** Footer **** --}}
        <div class="row bg-dark pt-2">
          <nav class="navbar navbar-expand-lg navbar-dark justify-content-center py-auto">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{ route('inicio') }}">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('sobreNosotros')}}">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contacta') }}">Contacta</a>
                </li>
                
              </ul>
              <div class="social-icons px-5">
                <a class="social-icon" href="#"><i class="fab fa-2x fa-linkedin-in filmlogoFooter"></i></a>
                <a class="social-icon" href="https://github.com/nandogithub2019/projecte"><i class="fab fa-2x fa-github filmlogoFooter"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-2x fa-twitter filmlogoFooter"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-2x fa-facebook-f filmlogoFooter"></i></a>
              </div>
          </nav>
        </div>


    </div>
{{-- MODAL BUSCAR --}}
    <div class="modal fade" id="ModalBuscar" tabindex="-1" aria-labelledby="ModalBuscarLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          
          <div class="modal-body">
            <form action="{{route('buscar')}}" method="POST">
              {{ csrf_field() }}
              <div class="mb-3">
                <label for="buscar" class="col-form-label"></label>
                <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Introduce el título a buscar...">
              </div>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-film1">Buscar</button>
            </form>
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn-lg colorLogo">Buscar</button> --}}
          </div>
        </div>
      </div>
    </div>
  </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> --}}
    <script src="{{asset('bootstrap-5/js/bootstrap.js')}}"></script>
    
    {{-- Enlace de turbolinks para SPA en livewire2 --}}
    {{-- <script src="{{asset('fonts/fontawesome/js/all.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>   --}}
    {{-- <script src="{{asset('js/app.js')}}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script> --}}
    @livewireScripts
  </body>
</html>
