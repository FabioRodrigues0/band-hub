<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Artists table with all columns
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('genres')->nullable();
            $table->timestamps();
        });

        // Bands table with all columns
        Schema::create('bands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('genres')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Albums table with all columns
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('year_release');
            $table->foreignId('band_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Tracks table
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('duration')->nullable();
            $table->foreignId('album_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Pivot table for artists and bands
        Schema::create('artist_band', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->foreignId('band_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        // Pivot table for albums and artists
        Schema::create('album_artist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained()->onDelete('cascade');
            $table->foreignId('artist_id')->constrained()->onDelete('cascade');
            $table->string('role')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_artist');
        Schema::dropIfExists('artist_band');
        Schema::dropIfExists('tracks');
        Schema::dropIfExists('albums');
        Schema::dropIfExists('bands');
        Schema::dropIfExists('artists');
    }
};
