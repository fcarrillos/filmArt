<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Pelicula;
use App\Models\Categoria;
use App\Models\Director;


class filmController extends Controller
{


    public function inicio(){
        /* Obtiene 3 id's de la tabla peliculas para mostrarlas en el slider de la página de inicio*/
        //$peliculaSlider = DB::table('peliculas')->pluck('id')->take(3);
        //$peliculaSlider = Pelicula::all()->pluck('id')->take(3);
        $peliculaSlider = Pelicula::pluck('id')->take(3);
        //dd($peliculaSlider);
        //$pelicula0 = DB::table('peliculas')->where('id',$peliculaSlider[0])->first();
        $pelicula0 = Pelicula::where('id',$peliculaSlider[0])->first();

        $pelicula1 = Pelicula::where('id',$peliculaSlider[1])->first();

        $pelicula2 = Pelicula::where('id',$peliculaSlider[2])->first();

        $peliculas = pelicula::all();
        //$peliculas = DB::table('peliculas')->get();
        
        return view('inicio')->with('peliculas',$peliculas)
                            ->with('pelicula0',$pelicula0)
                            ->with('pelicula1',$pelicula1)
                            ->with('pelicula2',$pelicula2);
    }

    

    public function usersGuest(){
        
        return view('usersGuest');
    }


    public function sobreNosotros(){

        return view('sobreNosotros');
    }
    
    public function contacta(){
        
        return view('contacta');
    }

    
    /* public function vistaBootstrap()
    {
        return view('layout');
    } */

    


}
