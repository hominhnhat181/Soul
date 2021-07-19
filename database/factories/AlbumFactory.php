<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(15),
            'image' => $this->faker->image('public/front/images',640,480, null, false),
            'title'=>$this->faker->text(40),
            'desc'=>$this->faker->text(100),
            'feature_id'=>Feature::all()->random()->id,
        ];
    }
}
