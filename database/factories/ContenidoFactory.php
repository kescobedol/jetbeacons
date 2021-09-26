<?php

namespace Database\Factories;

use App\Models\Beacon;
use App\Models\Contenido;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContenidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contenido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();
        return [
            //nombres de las columnas de la tabla a llenar con data de prueba
            'imagen_url' => $this->faker->unique()->word(40),
            'url' => $this->faker->unique()->word(40),
            'estado' => $this->faker->randomElement([1, 2]),
            'beacons_id'=> Beacon::all()->random()->id,
        ];
    }
}
