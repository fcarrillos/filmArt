<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;


class ListarPeliculasController extends Controller
{
    public function listarPeliculas()
    {
        //$peliculas = DB::table('peliculas')->get();
        $peliculas = pelicula::all();
        //dd($categorias);

        return view('listarPeliculas')->with('peliculas',$peliculas);
    }
}
