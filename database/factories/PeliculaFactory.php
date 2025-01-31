<?php

namespace Database\Factories;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeliculaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelicula::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titol' => $this->faker->sentence(2),
            'descripcio' => $this->faker->sentence(),
            'duracio' => $this->faker->randomElement(102,60,230),
            'productora' => $this->faker->sentence(),
        ];
    }
}
