<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;




class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categorias';

    protected $fillable = [
        'nom'
    ];
    protected $dates = [
        'deleted_at'
    ];
    /* 
        La relación 1-n entra las tablas categorias y peliculas
        se representa con este método
    */
    public function peliculas(){
        return $this->hasMany(Pelicula::class); 
    }
}
