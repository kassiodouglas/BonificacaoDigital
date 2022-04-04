<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Models\TiposMovimentacao;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->dateTime(),
            'id_type' => rand(1, 2),
            'value' => rand(0, 100),
            'observation' => $this->faker->words(3, true),
            'id_user'=> rand(1, 11),
            'id_admin'=> 1,
        ];
    }
}
