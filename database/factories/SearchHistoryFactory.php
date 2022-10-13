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
        $ip_addresses = ["195.169.210.149","75.185.4.181","197.16.8.226","232.108.98.99","93.180.232.133","69.150.57.233","66.199.93.109"
            ,"16.107.169.124","246.220.98.218","63.130.135.110","25.46.225.144","61.106.128.19","72.208.117.6","120.237.58.59","193.46.161.219"
            ,"210.249.149.130","198.161.234.250","203.220.93.120","53.135.87.241"];

        return [
            'keyword' => $words[array_rand($words)],
            'ip_address' => $ip_addresses[array_rand($ip_addresses)],
            'user_id' => User::all()->random()->id,
            'search_results' => fake()->paragraph,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
