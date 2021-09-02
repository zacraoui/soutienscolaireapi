<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Role::truncate();

        Role::create(['name' => "super_admin"]);
        Role::create(['name' => "teacher"]);
        Role::create(['name' => "student"]);
    }
}
