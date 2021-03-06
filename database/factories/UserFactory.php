<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use ApiKey;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "first_name"            =>  $this->faker->firstName ,
            "last_name"             =>  $this->faker->lastName ,
            "phone_number"          =>  $this->faker->unique()->phoneNumber ,
            "api_key"               =>  ApiKey::setModel(User::class)->generateKey() ,
            "password"              =>  "$2y$10$9MdwcXeB6w04a3dCcfS1iOgZapgWIncTmuSMFer49Lh3jhuu7Q/12" , // 123456
            "status"                =>  $this->faker->randomElement(["0" , "1"]) ,
            "user_type_id"          =>  $this->faker->randomElement( UserType::all()->pluck("id")->toArray() ) ,
            "remember_token"        =>  Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
