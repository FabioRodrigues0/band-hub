<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Band;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@bandhub.com',
            'password' => Hash::make('password'),
            'user_type' => UserType::ADMIN,
            'email_verified_at' => now(),
        ]);

        // Create regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@bandhub.com',
            'password' => Hash::make('password'),
            'user_type' => UserType::USER,
            'email_verified_at' => now(),
        ]);

        // Create test users (reduced number to avoid potential collisions)
        User::factory(3)->create();

        // Create artists
        $artists = Artist::factory(6)->create();

        // Create bands and attach random artists to each band
        Band::factory(3)->create()->each(function ($band) use ($artists) {
            $band->artists()->attach(
                $artists->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Create albums for each band
        Band::all()->each(function ($band) {
            Album::factory(rand(1, 2))->create([
                'band_id' => $band->id
            ]);
        });
    }
}
