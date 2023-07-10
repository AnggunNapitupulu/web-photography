<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */

  public function run()
  {
    $services = [
      ['Foto Fashion', 'Fashion at this time does not depend on everyday life, but more than that, fashion is a lifestyle. For this reason, this fashion service provides a good and correct way of dressing and in accordance with the desired style.'],
      ['Foto Beauty/makeup', 'Not only used to beautify themselves, cosmetics are also used in the world of photography. no wonder that more and more people are interested in trying to take selfies with themselves. Therefore, this service provides beauty photoshoot services that promote natural excellence from within.'],
      ['Foto Komersil/produk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis'],
      ['Foto Trip', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis'],
      ['Foto Stage/panggung', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis'],
      ['Foto Prewedding', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis'],
      ['Foto Sport', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil reprehenderit voluptates aspernatur accusamus dolore repellat cupiditate mollitia ratione assumenda perferendis'],
    ];
    foreach ($services as $service) {
      \App\Models\Service::create([
        'service' => $service[0],
        'slug_service' => Str::slug($service[0]),
        'description' => $service[1],
      ]);
    }
  }
}
