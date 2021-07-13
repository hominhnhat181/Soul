<?php

namespace Database\Seeders;

use App\Models\Album_Tag;
use Illuminate\Database\Seeder;

class AlbumTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album_Tag::factory()->count(5)->create(); 
    }
}
