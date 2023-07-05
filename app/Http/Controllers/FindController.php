<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Pelicula;



class FindController extends Controller
{


    public function buscar(Request $request){

        $inputBuscar = $request->get('buscar');
       
        $peliculas = pelicula::where('titol', 'LIKE', "%$inputBuscar%")->get();
 

        return view('buscar')->with('peliculas',$peliculas);
    }
}
