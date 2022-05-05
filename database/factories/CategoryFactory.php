<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"          =>  $this->faker->sentence(nbWords: 7) ,
            "slug"          =>  $this->faker->unique()->slug ,
            "image"         =>  $this->faker->randomElement([ "1.jpg" , "2.jpg" , "3.jpg" , "4.jpg" ]) ,
            "status"        =>  $this->faker->randomElement([0 , 1])
        ];
    }
}
