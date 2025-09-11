<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed categories
        $berita = \App\Models\Category::create([
            'name' => ['en' => 'News', 'id' => 'Berita'],
            'description' => ['en' => 'Latest news and updates', 'id' => 'Berita dan pembaruan terbaru'],
        ]);
        $artikel = \App\Models\Category::create([
            'name' => ['en' => 'Articles', 'id' => 'Artikel'],
            'description' => ['en' => 'In-depth articles', 'id' => 'Artikel mendalam'],
        ]);

        // Factorie For Berita Post
        $beritaPosts = \App\Models\Article::factory(10)->create([
            'category_id' => $berita->id,
        ]);

        // Factory For Artikel Post
        $artikelPosts = \App\Models\Article::factory(10)->create([
            'category_id' => $artikel->id,
        ]);
    }
}
