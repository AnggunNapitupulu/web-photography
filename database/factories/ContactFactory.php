<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    const INSTAGRAM_URI = 'https://www.instagram.com/';
    const LINKEDIN_URI ='https://www.linkedin.com/in/anggun-prihatini-napitupulu-584b95223/'; 
    const FACEBOOK_URI = 'https://www.facebook.com/';
    const TWITTER_URI = 'https://www.twitter.com/';
    const DRIBBLE_URI = 'https://www.dribbble.com/';
    const PINTEREST_URI = 'https://www.pinterest.com/';
    public function definition()
    {
        $name = $this->faker->name;
        // split $name by space
        $nameArr = explode(' ', $name);
        $url = 'https://api.unsplash.com/photos/random?page=1&per_page=1&query=man&client_id='.env('UNSPLASH_ACCESS_KEY');
        $object = Http::get($url)->object();
        return [
            'name' => $name,
            'email'  => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'bio' => $this->faker->text,
            'photo' => $object->urls->small_s3,
            'instagram' => self::INSTAGRAM_URI.Str::lower($nameArr[0]),
            'linkedin' => self::LINKEDIN_URI.Str::lower($nameArr[0]),
            'twitter' => self::TWITTER_URI.Str::lower($nameArr[0]),
            'facebook' => self::FACEBOOK_URI.Str::lower($nameArr[0]),
            'dribble' => self::DRIBBLE_URI.Str::lower($nameArr[0]),
            'pinterest' => self::PINTEREST_URI.Str::lower($nameArr[0]),
        ];
    }
}
