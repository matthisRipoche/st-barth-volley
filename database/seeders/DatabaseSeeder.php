<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\MenuItem;
use App\Models\Menu;
use App\Models\Page;
use App\Models\User;
use App\Models\Setting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => 'admin123',
            'is_admin' => true,
        ]);

        Article::factory()->count(10)->create();

        Page::factory()->create([
            'title' => 'Accueil',
            'slug' => 'home',
            'is_home' => true,
        ]);
        Page::factory()->create([
            'title' => 'Contact',
            'slug' => 'contact',
        ]);
        Page::factory()->create([
            'title' => 'A propos',
            'slug' => 'about',
        ]);
        Page::factory()->create([
            'title' => 'Article',
            'slug' => 'article',
            'is_news' => true,
        ]);

        $menu = Menu::factory()->create([
            'title' => 'Menu principal',
            'slug' => 'main',
        ]);

        MenuItem::factory()->create([
            'label' => 'Contact',
            'page_id' => Page::where('slug', 'contact')->first()->id,
            'menu_id' => $menu->id,
        ]);

        MenuItem::factory()->create([
            'label' => 'A propos',
            'page_id' => Page::where('slug', 'about')->first()->id,
            'menu_id' => $menu->id,
        ]);

        MenuItem::factory()->create([
            'label' => 'Article',
            'page_id' => Page::where('slug', 'article')->first()->id,
            'menu_id' => $menu->id,
        ]);

        Setting::factory()->create([
            'key' => 'header_menu_id',
            'value' => $menu->id,
        ]);
    }
}
