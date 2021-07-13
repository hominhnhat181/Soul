<?php

namespace Database\Seeders;

use App\Models\Artist_Album;
use Illuminate\Database\Seeder;

class ArtistAlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artist_Album::factory()->count(5)->create(); 
    }
}
