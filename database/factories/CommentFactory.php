<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "post_id"           =>  $this->faker->randomElement( Post::all()->pluck("id")->toArray() ) ,
            "user_id"           =>  $this->faker->randomElement( User::all()->pluck("id")->toArray() ) ,
            "message"           =>  $this->faker->text ,
            "status"            =>  $this->faker->randomElement([ 1 , 0 ])

        ];
    }
}
