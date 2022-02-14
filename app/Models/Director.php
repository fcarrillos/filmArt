<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


use App\Models\Pelicula;

class Director extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'directors';

    protected $fillable = [
        'nom'
    ];
    protected $dates = [
        'deleted_at'
    ];
    /* 
        La relación 1-n entra las tablas director y peliculas
        se representa con este método
    */
    public function peliculas(){
        return $this->hasMany(Pelicula::class);
    }
}
