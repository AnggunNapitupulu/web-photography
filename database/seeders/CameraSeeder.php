<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CameraSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    \App\Models\Camera::factory(5)->create();
  }
}
