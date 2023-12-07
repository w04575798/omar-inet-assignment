<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Insert sample data
        DB::table('users')->insert([
            'name' => 'Jane',
            'email' => 'jane@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Bob',
            'email' => 'bob@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password1'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Susan',
            'email' => 'susan@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password1'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => now(),
        ]);





    }
}
