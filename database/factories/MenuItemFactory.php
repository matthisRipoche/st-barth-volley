<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'label' => $this->faker->words(2, true),
            'order' => $this->faker->unique()->numberBetween(1, 100),
            'url' => null,
            'page_id' => Page::inRandomOrder()->first()?->id,
            'menu_id' => 1,
        ];
    }
}
