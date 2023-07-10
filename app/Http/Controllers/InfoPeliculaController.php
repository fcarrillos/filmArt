<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Pelicula;


class InfoPeliculaController extends Controller
{
    public function infoPelicula(Request $request){
       
        $id_pelicula = $request->id;
        //$pelicula = DB::table('peliculas')->where('id',$id_pelicula)->first();
        $pelicula = Pelicula::where('id',$id_pelicula)->first();

        $id_director = $pelicula->director_id;
        //dd($id_director);
        $director = DB::table('directors')->where('id',$id_director)->first();
        
        //dd($director);
        $director = $director->nom;
        //dd($director);
        if (Auth::check()) {

            return view('infoPelicula')->with('pelicula',$pelicula)
            ->with('director',$director);
           
        }else{
            return redirect('usersGuest'); /* inicio */
        }
        
    }

}
