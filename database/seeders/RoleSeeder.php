<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('roles')->insert([
            'name' => 'user-administrator',
            'description' => 'Administrator',
        ]);

        DB::table('roles')->insert([
            'name' => 'moderator',
            'description' => 'Moderator',
        ]);


        DB::table('roles')->insert([
            'name' => 'theme_manager',
            'description' => 'Theme Manager',
        ]);
    }
}
