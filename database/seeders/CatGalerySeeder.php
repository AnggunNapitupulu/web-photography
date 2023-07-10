<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CatGalerySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categorys = ['Prewedding', 'Products', 'Sport', 'Fashion', 'Stage', 'Beauty', 'Trip'];
    foreach ($categorys as $key => $value) {
      \App\Models\CatGallery::create([
        'category' => $value,
      ]);
    }
    //
  }
}
