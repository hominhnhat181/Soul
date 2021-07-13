<?php

namespace Database\Seeders;

use App\Models\Artist_Album;
use App\Models\Feature;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            FeatureSeeder::class,
            ArtistTableSeeder::class,
            AlbumTableSeeder::class,
            TagTableSeeder::class,
            TrackTableSeeder::class,
            AlbumTagSeeder::class,
            ArtistAlbumSeeder::class,
           
        ]);
    }
}
