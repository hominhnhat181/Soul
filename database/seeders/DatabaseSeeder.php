<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name' => "Nhat",
            'email' => "nhat@ho",
            'password' => Hash::make("123"), // password
            'status'    =>  '1',
        ]);
    }
}
