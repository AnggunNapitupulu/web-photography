<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // https://api.unsplash.com/search/photos?page=1&query=mountaion&
        // get value from UNSPLASH_ACCESS_KEY
        $url = 'https://api.unsplash.com/photos/random?page=1&per_page=1&query=mountaion&client_id='.env('UNSPLASH_ACCESS_KEY');
        $object = Http::get($url)->object();
        return [
            'title' => $object->location->title,
            'path_image' => $object->urls->small_s3,
        ];
    }
}
