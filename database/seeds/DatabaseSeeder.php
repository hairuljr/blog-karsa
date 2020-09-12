<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Blog\{Blog, Category};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class)->create();
        $this->call(CategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CategoryBlogSeeder::class);
    }
}
