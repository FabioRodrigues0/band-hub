<?php

namespace Database\Factories;

use App\Models\Band;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlbumFactory extends Factory
{
    protected $albums = [
        ['name' => '÷ (Divide)', 'artist' => 'Ed Sheeran', 'year' => '2017', 'cover' => 'https://i.scdn.co/image/ab67616d0000b27312a7c2f7d9a3c5162a5c3ac4'],
        ['name' => 'Midnights', 'artist' => 'Taylor Swift', 'year' => '2022', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273bb54dde68cd23e2a268ae0f5'],
        ['name' => 'After Hours', 'artist' => 'The Weeknd', 'year' => '2020', 'cover' => 'https://i.scdn.co/image/ab67616d0000b2738863bc11d2aa12b54f5aeb36'],
        ['name' => 'Certified Lover Boy', 'artist' => 'Drake', 'year' => '2021', 'cover' => 'https://i.scdn.co/image/ab67616d0000b2739416ed64daf84936d89e671c'],
        ['name' => 'Positions', 'artist' => 'Ariana Grande', 'year' => '2020', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273de1a3a5eaa0c75bb10c37928'],
        ['name' => 'Hollywood\'s Bleeding', 'artist' => 'Post Malone', 'year' => '2019', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273c5148520a59be191eea16989'],
        ['name' => 'Future Nostalgia', 'artist' => 'Dua Lipa', 'year' => '2020', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273bd26ede1ae69327010d49946'],
        ['name' => 'Planet Her', 'artist' => 'Doja Cat', 'year' => '2021', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273a186530333c2f3c159f3d9a0'],
        ['name' => 'SOUR', 'artist' => 'Olivia Rodrigo', 'year' => '2021', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273a91c10fe9472d9bd89802e5a'],
        ['name' => 'Justice', 'artist' => 'Justin Bieber', 'year' => '2021', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273e6f407c7f3a0ec98845e4431'],
        ['name' => '30', 'artist' => 'Adele', 'year' => '2021', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273c6b577e4c4a6d326354a89f7'],
        ['name' => 'Happier Than Ever', 'artist' => 'Billie Eilish', 'year' => '2021', 'cover' => 'https://i.scdn.co/image/ab67616d0000b273c8a11e48c91a982d086afc69'],
    ];

    public function definition(): array
    {
        $album = fake()->unique()->randomElement($this->albums);
        $band = Band::inRandomOrder()->first();
        
        return [
            'name' => $album['name'],
            'slug' => Str::slug($album['name']) . '-' . Str::random(6),
            'description' => fake()->paragraph(),
            'image' => $album['cover'],
            'year_release' => $album['year'],
            'band_id' => $band->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
