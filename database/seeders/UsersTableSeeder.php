<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
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

        // Create roles
        $userAdmin = Role::create(['name' => 'UserAdmin', 'description' => 'User Administrator']);
        $moderator = Role::create(['name' => 'Moderator', 'description' => 'Moderator']);
        $themeAdmin = Role::create(['name' => 'ThemeAdmin', 'description' => 'Theme Administrator']);

        // Assign roles to users
        $jane = User::where('email', 'jane@example.com')->first();
        $bob = User::where('email', 'bob@example.com')->first();
        $susan = User::where('email', 'susan@example.com')->first();

        $jane->roles()->attach($userAdmin);
        $bob->roles()->attach($moderator);
        $susan->roles()->attach($themeAdmin);
    }
}
