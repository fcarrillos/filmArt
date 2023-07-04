<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Categoria;
use App\Models\Director;

class Pelicula extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'titol',
        'descripcio',
        'duracio',
        'productora',
        'ruta_imatge',
        'ruta_video',
        'id_director'
    ];
    protected $dates = [
        'deleted_at'
    ];
    /* 
        La relación 1-n entra las tablas peliculas y director y categorias
        se representa con este método
    */
    public function categoria(){
        return $this->hasOne(Categoria::class);
    }
    public function director(){
        return $this->belongsTo(Director::class);
    }
    /* 
        La relación 1-n entra las tablas peliculas y users
        se representa con este método, una pelicula puede tener
        diversos usuarios
    */
    public function users(){
        return $this->hasMany(User::class);
    }
}
