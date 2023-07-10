<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

class CameraFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */

  public function definition()
  {
    $url = 'https://api.unsplash.com/photos/random?page=1&per_page=1&query=camera&client_id=' . env('UNSPLASH_ACCESS_KEY');
    $object = Http::get($url)->object();
    return [
      'camera' => $object->exif->model,
      'slug_camera' => $object->id,
      'photo' =>  $object->urls->small_s3,
      'price' => $this->faker->numberBetween(100000, 2000000),
      'description' => $object->description,
    ];
  }
}
