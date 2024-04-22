<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        $attr  = rand(1 , 99);
//        $value  = rand(1 , 99);
//        dd($attr);
        return [
            'attr' => [[1,27]] ,
        ];
    }
}
