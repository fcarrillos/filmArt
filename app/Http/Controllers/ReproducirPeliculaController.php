<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Pelicula;

class ReproducirPeliculaController extends Controller
{
    public function reproducirPelicula(Request $request){

       
        $id_pelicula = $request->id;
        //$pelicula = Pelicula::where('id',$id_pelicula)->first();
        $pelicula = DB::table('peliculas')->where('id',$id_pelicula)->first();
        //dd($pelicula);
        if (Auth::check()) {
            
            return view('reproducirPelicula')->with('pelicula',$pelicula);
           
        }else{
            return redirect('usersGuest');
        }
        
    }
}
