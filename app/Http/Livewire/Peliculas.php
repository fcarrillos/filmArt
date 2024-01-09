<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pelicula;

class Peliculas extends Component
{
    public function render()
    {
        return view('livewire.peliculas',[

            'peliculas' => Pelicula::all(),])
            ->extends('layouts.layout');
            
    }
}
