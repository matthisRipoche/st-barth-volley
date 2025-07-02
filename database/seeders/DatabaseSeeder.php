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

        $homePage = Page::factory()->create([
            'title' => 'Accueil',
            'slug' => 'home',
            'is_home' => true,
        ]);

        $contactPage = Page::factory()->create([
            'title' => 'Contact',
            'slug' => 'contact',
        ]);

        $aboutPage = Page::factory()->create([
            'title' => 'A propos',
            'slug' => 'about',
        ]);

        $newsPage = Page::factory()->create([
            'title' => 'Article',
            'slug' => 'article',
            'is_news' => true,
        ]);


        Menu::factory()->create([
            'title' => 'Menu principal',
            'slug' => 'main',
        ]);

        $menu = Menu::first();

        MenuItem::factory()->create([
            'label' => 'Contact',
            'page_id' => $contactPage->id,
            'menu_id' => $menu->id,
            'order' => 3,
        ]);

        MenuItem::factory()->create([
            'label' => 'A propos',
            'page_id' => $aboutPage->id,
            'menu_id' => $menu->id,
            'order' => 2,
        ]);

        MenuItem::factory()->create([
            'label' => 'Article',
            'page_id' => $newsPage->id,
            'menu_id' => $menu->id,
            'order' => 1,
        ]);


        Setting::factory()->create([
            'key' => 'header_menu_id',
            'value' => $menu->id,
        ]);
    }
}
