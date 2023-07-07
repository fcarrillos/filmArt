<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\File;


use App\Models\User;
use App\Models\Pelicula;
use App\Models\Categoria;
use App\Models\Director;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculasAll = Pelicula::all(); /* obtiene todas las películas */
        $directors = DB::table('directors')->get();
        //dd($director);
        $userCheckedId = auth()->user()->id;
        //dd($userCheckedId);
        $peliculas = Pelicula::where('id_users',$userCheckedId)->get();
        //dd($peliculas);
        if (Auth::check()){
            $userChecked = auth()->user()->name;
            $userAdmin = user::where('is_admin',1)
            ->where('name',$userChecked);
            //dd($userAdmin);
            $userEditor = user::where('is_editor',1)
            ->where('name',$userChecked);
            //dd($userEditor);
            if((auth()->user()->is_admin==true && auth()->user()->is_editor==true) || auth()->user()->is_admin==true){
                $peliculas = $peliculasAll;
                
                return view('pelicula.index')->with('peliculas',$peliculas)
                ->with('directors',$directors);/* panelEdicion */

            }elseif(auth()->user()->is_editor==true){
                
                //dd($peliculas);
                return view('pelicula.index')->with('peliculas',$peliculas)
                ->with('directors',$directors);/* panelEdicion */

            }else{
                return view('usersGuest');
            }  
        }else{
            return redirect('usersGuest');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* consulta con query builder, con eloquent no funciona */
        $categorias = DB::table('categorias')->get();
        //$categorias = Categoria::all();
 
        /* Comprueba que el usuario está autenticado y es admin */
        if (Auth::check()){
            $userChecked = auth()->user()->name;
            $userEditor = user::where('is_editor',1)
            ->where('name',$userChecked);
            if(auth()->user()->is_admin || auth()->user()->is_editor){ /*   */
                return view('pelicula.create')->with('categorias',$categorias);
                
            }else{
                return view('usersGuest');
            }  
        }else{
            return redirect('usersGuest');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peliculas = new Pelicula();
        /* Validación del formulario */
        $this->validate($request,[
            'titol' => 'required',
            'descripcio' => 'required|max:1000',
            'duracio' => 'required|numeric',
            'categoria' => 'required', 
            'director' => 'required|max:50',
            'productora' => 'required|max:200',
            'imatge1' => 'required|image',
            'imatge2' => 'required|image',
            'imatge3' => 'required|image',
            'video' => 'required|mimetypes:video/mp4'
            
        ]);

        /* GUARDAR IMATGE 1 -- storage\app\public */
        
        $file_foto1 = $request->file('imatge1');
        $imatge1 = $file_foto1->getClientOriginalName();
        $img1 = auth()->id() . $imatge1;
        \Storage::disk('local')->put($img1, \File::get($file_foto1));

        /* GUARDAR IMATGE 2 -- storage\app\public */
        
        $file_foto2 = $request->file('imatge2');
        $imatge2 = $file_foto2->getClientOriginalName();
        $img2 = auth()->id() . $imatge2;
        \Storage::disk('local')->put($img2, \File::get($file_foto2));

        /* GUARDAR IMATGE 3 -- storage\app\public */
        
        $file_foto3 = $request->file('imatge3');
        $imatge3 = $file_foto3->getClientOriginalName();
        $img3 = auth()->id() . $imatge3;
        \Storage::disk('local')->put($img3, \File::get($file_foto3));

        /* GUARDA MOVIE -- storage\app\public */
        $file_video = $request->file('video');
        $video = $file_video->getClientOriginalName();
        $vdo = auth()->id() . $video;
        \Storage::disk('local')->put($vdo, \File::get($file_video));

        /* Comprueba si existe el director en la tabla directors */
       
        $consulta = DB::table('directors')
        ->where('nom',$request->get('director'))->first();
        //dd(!$consulta);
        if (!$consulta){ 
            //dd('dentro ');
            $director = new Director();
            $director->nom = $request->get('director');      
            $director->save();

            $peliculas->id_director = $director->id;
            
        }else{
            $peliculas->id_director = $consulta->id;
        }
        
        //$peliculas = new Pelicula();
        $peliculas->titol = $request->get('titol');
        $peliculas->descripcio = $request->get('descripcio');
        $peliculas->duracio = $request->get('duracio');
        $peliculas->productora = $request->get('productora');
        $peliculas->ruta_imatge1 = $img1;
        $peliculas->ruta_imatge2 = $img2;
        $peliculas->ruta_imatge3 = $img3;
        $peliculas->ruta_video = $vdo;
        $peliculas->id_users = auth()->user()->id;
        $peliculas->id_categoria = $request->get('categoria');
        //$peliculas->id_director = $director->id;

        $peliculas->save();

        return redirect('/peliculas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $categorias = DB::table('categorias')->get();
        
        $peliculas = Pelicula::where('id',$id)->first();
        
        $categoria_id = $peliculas->id_categoria;
        $categoria = DB::table('categorias')->where('id',$categoria_id)->first();
        //dd($categoria->nom);
        $director_id = $peliculas->id_director;
        $director = DB::table('directors')->where('id',$director_id)->first();
        //dd($director->nom);
        return view('pelicula.edit',compact('peliculas'))
        ->with('categorias',$categorias)
        ->with('categoria',$categoria->nom)
        ->with('director',$director);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula = DB::table('peliculas')->where('id',$id)->first();
        $cambio = Pelicula::find($id);
         /* Validación del formulario */
         $this->validate($request,[
            'titol' => 'required',
            'descripcio' => 'required|max:1000',
            'duracio' => 'required|numeric',
            'categoria' => 'required',
            'director' => 'required|max:50', 
            'productora' => 'required|max:200'
           
            
        ]);
        

        if ($request->hasFile('imatge1')){
            $this->validate($request,[
                'imatge1' => 'required|image'
                ]);
                
            $file_foto1 = $request->file('imatge1');
            $imatge1 = $file_foto1->getClientOriginalName();
            $img1 = auth()->id() . $imatge1;
            \Storage::disk('local')->put($img1, \File::get($file_foto1));    
            $cambio->ruta_imatge1 = $img1;
        }else{
            $cambio->ruta_imatge1 = $pelicula->ruta_imatge1;
        }

        if ($request->hasFile('imatge2')){
            
            $this->validate($request,[
                'imatge2' => 'required|image'
                ]);
            $file_foto2 = $request->file('imatge2');
            $imatge2 = $file_foto2->getClientOriginalName();
            $img2 = auth()->id() . $imatge2;
            \Storage::disk('local')->put($img2, \File::get($file_foto2));    
            $cambio->ruta_imatge2 = $img2;    
        }else{
            $cambio->ruta_imatge2 = $pelicula->ruta_imatge2;
        }

        if ($request->hasFile('imatge3')){
            
            $this->validate($request,[
                'imatge3' => 'required|image'
                ]);
            $file_foto3 = $request->file('imatge3');
            $imatge3 = $file_foto3->getClientOriginalName();
            $img3 = auth()->id() . $imatge3;
            \Storage::disk('local')->put($img3, \File::get($file_foto3));    
            $cambio->ruta_imatge3 = $img3;    
        }else{
            $cambio->ruta_imatge3 = $pelicula->ruta_imatge3;
        }

        if ($request->hasFile('video')){
            
            $this->validate($request,[
                'video' => 'required|mimetypes:video/mp4'
                ]);
                $file_video = $request->file('video');
                $video = $file_video->getClientOriginalName();
                $vdo = auth()->id() . $video;
                \Storage::disk('local')->put($vdo, \File::get($file_video));   
                $cambio->ruta_video = $vdo;    
        }else{
            $cambio->ruta_video = $pelicula->ruta_video;
        }        

        /* Comprueba si existe el director en la tabla directors */
       
        $consulta = DB::table('directors')
        ->where('nom',$request->get('director'))->first();
        //dd(!$consulta);
        if (!$consulta){ 
            //dd('dentro ');
            $director = new Director();
            $director->nom = $request->get('director');      
            $director->save();
            $cambio->id_director = $director->id;
            
        }else{
            $cambio->id_director = $consulta->id;
        }
        

        $cambio->titol = $request->get('titol');
        $cambio->descripcio = $request->get('descripcio');
        $cambio->duracio = $request->get('duracio');
        $cambio->productora = $request->get('productora');
        //$cambio->id_users = auth()->user()->id;
        /* no modifica el valor de id_users, respetando así al usuario que dió de alta la película, aunque el Admin la modifique posteriormente */
        $cambio->id_categoria = $request->get('categoria');
        //$cambio->id_director = $director->id;

        $cambio->save();
        

        return redirect()->route('peliculas.index')
        ->with('success','Pelicula actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelicula::find($id)->delete();
        //Pelicula::find($id)->forceDelete(); /* Borra definitivamente el registro en la BBDD */

        return redirect()->route('peliculas.index');
    }

    
}




