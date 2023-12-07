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
            'name' => 'UserAdmin',
            'description' => 'User Administrator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            'name' => 'Moderator',
            'description' => 'Moderator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('roles')->insert([
            'name' => 'ThemeAdmin',
            'description' => 'Theme Administrator',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
