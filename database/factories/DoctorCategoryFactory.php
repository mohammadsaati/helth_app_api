<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Doctor;
use App\Models\DoctorCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DoctorCategory>
 */
class DoctorCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DoctorCategory::class;

    public function definition()
    {
        return [
            "category_id"       =>  $this->faker->randomElement( Category::all()->pluck("id")->toArray() ) ,
            "doctor_id"         =>  $this->faker->randomElement( Doctor::all()->pluck("id")->toArray() ) ,
        ];
    }
}
