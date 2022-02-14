@extends('layouts.layout')

@section('content')   {{-- index --}}

<div class="row bg-light">
  <div class="col-md-10 offset-md-1 my-5 table-responsive">{{-- centro el formulario --}}
    <h2 class="colorLogo">Administración de Películas</h2>

    <a href="{{route('peliculas.create')}}" class="btn btn-filmCrear">Crear</a>

    <table class="table table-striped table-hover mt-4">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Título</th>
        <th scope="col">Director</th>
        <th scope="col">Descripción</th>
        <th scope="col">Duración</th>
        <th scope="col">Productora</th>
        
        <th></th>
      </tr>
    </thead>
    <tbody>
  
      @foreach ($peliculas as $pelicula)
      
        <tr>
          <td>{{ $pelicula->id }}</td>
          <td>{{ $pelicula->titol }}</td>
          <td>
            @foreach ($directors as $director)
              @if ($pelicula->id_director == $director->id)
                {{ $director->nom }}
              @endif  
            @endforeach
          </td>
          
          <td>{{ $pelicula->descripcio }}</td>
          <td>{{ $pelicula->duracio }}</td>
          <td>{{ $pelicula->productora }}</td>
        
          <td>
            <form id="delete_form" action="{{ route('peliculas.destroy',$pelicula->id) }}" method="POST">
              @csrf

              @method('DELETE')
              <a class="btn btn-film1" href="{{ route('peliculas.edit',$pelicula->id) }}">Editar</a>

              <a class="btn btn-filmDelete mt-1 delete_link" id="{{ $pelicula }}"  
              href="" data-bs-toggle="modal" data-bs-target="#ModalBorrar" data-bs-whatever="@mdo">Borrar</a>{{-- data-bs-toggle="modal" data-bs-target="#ModalBorrar" data-bs-whatever="@mdo" --}}
    
            </form>
          </td>
        </tr>
      @endforeach
  
    </tbody>
    </table>
  </div> 
{{-- MODAL BORRAR --}}
  <div class="modal fade" id="ModalBorrar" tabindex="-1" aria-labelledby="ModalBorrarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="modal-body">
          <h5>Vas a borrar la película: <span id="zona_de_nombre" class="fst-italic"></span></h5>{{-- {{ $pelicula->titol }} --}}
          
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="btn_confirm" class="btn btn-film1">Borrar</button>
        
        </div>
        
      </div>
    </div>
  </div>
</div>  

<script>

  var pelicula;
  var pelicula_array;

  // Cuando se pulsa el icono de borrar
  // pasa el título de la película al modal
  $('.delete_link').on('click', function(e){

    e.preventDefault();
    pelicula = $(this).attr('id');
    pelicula_array = JSON.parse(pelicula);
    $('#zona_de_nombre').html(pelicula_array["titol"]);
    //$('#ModalBorrar').modal('open');
  });

  // Confirmar borrado
  $('#btn_confirm').on('click', function(e){

    e.preventDefault();
    var destino = ($("#delete_form").attr('action'));
    var corte = destino.lastIndexOf('/') + 1;
    var destinoBase = destino.substr(0, corte);
    destino = destinoBase + pelicula_array["id"];
    $("#delete_form").attr('action', destino);
    $("#delete_form").submit();

  });

</script>



@endsection