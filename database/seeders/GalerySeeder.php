<?php

namespace Database\Seeders;

use App\Models\CatGallery;
use Illuminate\Database\Seeder;

class GalerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorys = CatGallery::all()->pluck('id')->toArray();
        foreach($categorys as $key => $value){
            \App\Models\Gallery::factory(2)->create([
                'cat_gallery_id' => $value,
            ]);
        }
    }
}
