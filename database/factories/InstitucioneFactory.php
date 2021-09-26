<?php

namespace Database\Factories;

use App\Models\Institucione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class InstitucioneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Institucione::class;

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
            'nombre' =>$name,
            'descripcion' =>$this->faker->paragraph(),
            'estado' => $this->faker->randomElement([1, 2]),
        ];
    }
}
