<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
          "food",
          "sport",
          "tech"
        ];
        $random = $categories[rand(0,2)];
        return [
            "title" => $this->faker->sentence(),
            "content" => $this->faker->paragraphs(3,true),
            "categorie" => $random,
            "imageUrl" => $this->faker->imageUrl(640, 480, null, true)
        ];
    }
}
