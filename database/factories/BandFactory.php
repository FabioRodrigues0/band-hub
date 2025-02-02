<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BandFactory extends Factory
{
    protected $bands = [
        ['name' => 'Coldplay', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb989ed05e1f0570cc4726c2d3'],
        ['name' => 'Imagine Dragons', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb920dc1f617550de8388f368e'],
        ['name' => 'Maroon 5', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb975249d4ef20aaec6c7c03f8'],
        ['name' => 'Twenty One Pilots', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb9e3acf1eaf3b8846e836f441'],
        ['name' => 'The 1975', 'image' => 'https://i.scdn.co/image/ab6761610000e5ebace447a0a91b67b0f9a9a349'],
        ['name' => 'Arctic Monkeys', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb7da39dea0a72f581535fb11f'],
    ];

    public function definition(): array
    {
        $band = fake()->unique()->randomElement($this->bands);
        
        return [
            'name' => $band['name'],
            'slug' => str()->slug($band['name']),
            'description' => fake()->paragraph(),
            'genres' => implode(',', fake()->randomElements(['Rock', 'Pop', 'Alternative', 'Indie', 'Electronic'], 2)),
            'image' => $band['image'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
