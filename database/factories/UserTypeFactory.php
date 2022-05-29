<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserType>
 */
class UserTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name"          =>  $this->faker->randomElement(["customer" , "doctor"]) ,
            "status"        =>  $this->faker->randomElement(["0" , "1"])
        ];
    }
}
