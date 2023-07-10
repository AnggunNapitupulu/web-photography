<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    public function run()
    {

        $permissons = [
            [
                'name' => 'Check Controller@index',
                'display_name' => 'Index',
                'description' => 'Check Index'
            ],
            [
                'name' => 'Check Controller@create',
                'display_name' => 'Create',
                'description' => 'Check Create'
            ],
        ];

        foreach ($permissons as $key => $value) {

            $permission = Permission::create([
                            'name' => $value['name'],
                            'display_name' => $value['display_name'],
                            'description' => $value['description']
                        ]);

            User::first()->attachPermission($permission);
        }
    }
}

