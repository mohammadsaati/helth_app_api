<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"              =>  $this->faker->sentence(7) ,
            "slug"              =>  $this->faker->unique()->slug ,
            "image"             =>  $this->faker->randomElement([ "1.jpg" , "2.jpg" , "3.jpg" ]) ,
            "category_id"       =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
            "priority"          =>  rand(1 , 1000) ,
            "description"       =>  $this->faker->text ,
            "status"            =>  $this->faker->randomElement([ 0 , 1 ])
        ];
    }
}
