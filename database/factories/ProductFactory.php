<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return[
            'name' => fake()->word(),
            'price' => rand(20, 200)/100.0,
            'qty' => rand(1, 5),
            'description' => ' some text '
        ];
    }
}