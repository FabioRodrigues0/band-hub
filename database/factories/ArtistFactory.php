<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    protected $artists = [
        ['name' => 'Ed Sheeran', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb12a2ef08d00dd7451a6dbed6'],
        ['name' => 'Taylor Swift', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb5a00969a4698c3132a15fbb0'],
        ['name' => 'The Weeknd', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb214f3cf1cbe7139c1e26ffbb'],
        ['name' => 'Drake', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb4293385d324db8558179afd9'],
        ['name' => 'Ariana Grande', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb7eb7f6371aad8e67e01f0a03'],
        ['name' => 'Post Malone', 'image' => 'https://i.scdn.co/image/ab6761610000e5eb6be070445b03e0b63147c2c1'],
        ['name' => 'Dua Lipa', 'image' => 'https://i.scdn.co/image/ab67616d0000b273bd26ede1ae69327010d49946'],
        ['name' => 'Doja Cat', 'image' => 'https://i.scdn.co/image/ab67616d0000b273a186530333c2f3c159f3d9a0'],
        ['name' => 'Olivia Rodrigo', 'image' => 'https://i.scdn.co/image/ab67616d0000b273a91c10fe9472d9bd89802e5a'],
        ['name' => 'Justin Bieber', 'image' => 'https://i.scdn.co/image/ab67616d0000b273e6f407c7f3a0ec98845e4431'],
        ['name' => 'Adele', 'image' => 'https://i.scdn.co/image/ab67616d0000b273c6b577e4c4a6d326354a89f7'],
        ['name' => 'Billie Eilish', 'image' => 'https://i.scdn.co/image/ab67616d0000b273c8a11e48c91a982d086afc69'],
    ];

    public function definition(): array
    {
        $artist = fake()->unique()->randomElement($this->artists);
        
        return [
            'name' => $artist['name'],
            'slug' => str()->slug($artist['name']),
            'description' => fake()->paragraph(),
            'image' => $artist['image'],
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
