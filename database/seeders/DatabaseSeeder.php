<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Doctor;
use App\Models\DoctorCategory;
use App\Models\Post;
use App\Models\User;
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
         User::factory(50)->create();
         Category::factory(20)->create();
         Doctor::factory(40)->create();
         DoctorCategory::factory(40)->create();
         Post::factory(80)->create();
         Comment::factory(50)->create();
    }
}
