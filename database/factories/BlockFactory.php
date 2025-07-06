<?php

namespace Database\Factories;

use App\Models\Block;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlockFactory extends Factory
{
    protected $model = Block::class;

    public function definition(): array
    {
        $types = ['image_texte', 'citation', 'video'];
        $type = $this->faker->randomElement($types);

        return [
            'name' => ucfirst($type),
            'type' => $type,
            'content' => match ($type) {
                'image_texte' => [
                    'titre' => $this->faker->sentence(),
                    'texte' => $this->faker->paragraph(),
                    'image' => 'https://picsum.photos/seed/' . $this->faker->word() . '/600/400',
                    'image_left' => $this->faker->boolean(),
                ],
                'citation' => [
                    'auteur' => $this->faker->name(),
                    'citation' => $this->faker->realText(100),
                ],
                'video' => [
                    'url' => 'https://www.youtube.com/embed/' . $this->faker->regexify('[A-Za-z0-9_-]{11}'),
                    'caption' => $this->faker->sentence(6),
                ],
                default => [
                    'message' => 'Bloc de type inconnu (' . $type . ')'
                ]
            }
        ];
    }
}
