<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Tag;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Track::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(15),
            'images' => $this->faker->image('public/front/images',640,480, null, false),
            'song'=>$this->faker->text(100),
            'artist_id'=>Artist::all()->random()->id,
            'album_id'=>Album::all()->random()->id,
            'tag_id'=>Tag::all()->random()->id,
        ];
    }
}
