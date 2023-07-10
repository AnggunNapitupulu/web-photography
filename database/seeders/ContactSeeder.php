<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(\App\Models\Contact::count() > 0){
            DB::table('contacts')->truncate();
        }
        \App\Models\Contact::factory(6)->create();
    }
}
