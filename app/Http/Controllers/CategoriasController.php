<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pelicula;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function vistaCategorias(Request $request, $categoria=0)
    {
        if ($categoria == null){
            /* Al usar el softdelete, que es el borrado lógico, no borra los datos definitivamente de la base de datos,  */
            // $peliculas = DB::table('peliculas')->get();
            
            $peliculas = Pelicula::all(); /* obtiene las películas cuyo campo deleted_at es igual a null */
            $peliculas_id = Pelicula::all()->pluck('id_categoria'); /* obtiene el id_categoria de las películas que no están borradas*/
            $categorias = DB::table('categorias')->whereIn('id',$peliculas_id)->get();
            /* obtiene de la tabla categorías aquellas que se corresponden con las películas que están activas, es decir, que no han sufrido un borrado lógico  */

            return view('categorias')->with('peliculas',$peliculas)
                                 ->with('categorias',$categorias);
        }else{
            $peliculas = Pelicula::where('id_categoria',$categoria)->get();
            if ($peliculas){
               
                $peliculas_id = Pelicula::all()->pluck('id_categoria');
                $categorias = DB::table('categorias')->whereIn('id',$peliculas_id)->get();
                return view('categorias')->with('peliculas',$peliculas)
                                        ->with('categorias',$categorias);
            } else{
                return view('categorias')->with("No existe coincidencias para esta categoría");
            }                        
        }
        
    }
}
