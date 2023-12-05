<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        // Insert sample data
        DB::table('users')->insert([
            'name' => 'Jane',
            'email' => 'jane@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'password' => bcrypt('password1'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Susan',
            'email' => 'susan@example.com',
            'password' => bcrypt('password1'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
