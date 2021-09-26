<?php

namespace Database\Factories;

use App\Models\Beacon;
use App\Models\Institucione;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeaconFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beacon::class;

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
            'uuid' => $this->faker->unique()->word(20),
            'nombre' => $name,
            'estado' => $this->faker->randomElement([1, 2]),
            'instituciones_id'=> Institucione::all()->random()->id,
        ];
    }
}
