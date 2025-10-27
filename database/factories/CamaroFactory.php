<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Camaro>
 */
class CamaroFactory extends Factory
{
    protected $model = \App\Models\Camaro::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word() . ' Camaro',
            'year' => $this->faker->numberBetween(1967, 2024),
            'description' => $this->faker->paragraph(),
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'user_id' => User::inRandomOrder()->first()->id ?? 1,
            'image_url' => 'https://source.unsplash.com/featured/?camaro,car', // voorbeeld afbeelding
        ];
    }
}
