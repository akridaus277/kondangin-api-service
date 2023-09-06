<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TamuFactory extends Factory
{

    public function definition()
    {
        return [
            'nama' => $this->faker->name(),

        ];
    }


}
