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

    public function verPelicula(Request $request){

       
        $id_pelicula = $request->id;
        $pelicula = DB::table('peliculas')->where('id',$id_pelicula)->first();
        $id_director = $pelicula->id_director;
        //dd($id_director);
        $director = DB::table('directors')->where('id',$id_director)->first();
        //dd($director);
        $director = $director->nom;
        //dd($director);
        if (Auth::check()) {

            return view('verPelicula')->with('pelicula',$pelicula)
            ->with('director',$director);
           
        }else{
            return redirect('usersGuest'); /* inicio */
        }
        
    }

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


    public function usersGuest(){
        
        return view('usersGuest');
    }


    public function sobreNosotros(){

        return view('sobreNosotros');
    }
    
    public function contacta(){
        
        return view('contacta');
    }

    public function panelAdmin(){
        /* si el usuari està logat i és admin pot accedir */
        if (Auth::check()){
            $userChecked = auth()->user()->name;
            $userAdmin = user::where('is_admin',1)
            ->where('name',$userChecked);
            if($userAdmin){
                return view('panelAdmin');
            }else{
                return view('inicio');
            }  
        }else{
            return redirect('inicio');
        }
    }    

    
    
    
    public function vistaBootstrap()
    {
        return view('layout');
    }

    


}
