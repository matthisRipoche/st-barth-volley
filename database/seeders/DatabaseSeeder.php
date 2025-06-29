<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\MenuItem;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => 'admin123',
            'is_admin' => true,
        ]);

        Article::factory()->count(10)->create();
        Page::factory()->count(10)->create();
        Menu::factory()->create([
            'title' => 'Menu principal',
            'slug' => 'main',
        ]);
        Menu::factory()->count(2)->create();

        MenuItem::factory()->count(10)->create();
    }
}
