<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'title'   => $title,
            'slug'    => Str::slug($title) . '-' . Str::random(5),
            'content' => $this->faker->paragraphs(3, true),
            'image'   => 'articles/' . $this->faker->image('storage/app/public/articles', 640, 480, null, false),
            'user_id' => User::factory(), // Associe un user existant ou nouveau
        ];
    }
}
