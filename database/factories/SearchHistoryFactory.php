<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SearchHistory>
 */
class SearchHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $words = ['lake', 'glide', 'wear', 'era', 'teacher', 'captain', 'catch', 'humor', 'progressive', 'pair',
            'deny', 'extort', 'father', 'plaster', 'hero', 'chocolate', 'constant', 'regard', 'wake', 'sulphur',];

        return [
            'keyword' => $words[array_rand($words)],
            'ip_address' => fake()->ipv4,
            'user_id' => User::all()->random()->id,
            'search_results' => fake()->paragraph,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
