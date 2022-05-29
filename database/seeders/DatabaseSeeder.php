<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Doctor;
use App\Models\DoctorCategory;
use App\Models\Post;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserType::factory(3)->create();
         User::factory(100)->create();
         Category::factory(50)->create();
         Doctor::factory(50)->create();
         DoctorCategory::factory(40)->create();
         Post::factory(80)->create();
         Comment::factory(50)->create();
    }
}
