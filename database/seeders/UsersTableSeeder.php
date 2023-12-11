<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $timestamp = now();

        // Clear existing records to avoid ID conflicts
        User::whereIn('email', ['jane@example.com', 'bob@example.com', 'susan@example.com'])->delete();

        // Insert sample data for Jane
        $jane = User::firstOrCreate(
            ['email' => 'jane@example.com'],
            [
                'name' => 'Jane',
                'email_verified_at' => $timestamp,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(60),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                // 'deleted_at' => now(), // You can exclude this line for initially active users
            ]
        );

        // Insert sample data for Bob
        $bob = User::firstOrCreate(
            ['email' => 'bob@example.com'],
            [
                'name' => 'Bob',
                'email_verified_at' => $timestamp,
                'password' => bcrypt('password1'),
                'remember_token' => Str::random(60),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                // 'deleted_at' => now(), // You can exclude this line for initially active users
            ]
        );

        // Insert sample data for Susan
        $susan = User::firstOrCreate(
            ['email' => 'susan@example.com'],
            [
                'name' => 'Susan',
                'email_verified_at' => $timestamp,
                'password' => bcrypt('password1'),
                'remember_token' => Str::random(60),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                // 'deleted_at' => now(), // You can exclude this line for initially active users
            ]
        );

        // Create roles
        $userAdmin = Role::create(['name' => 'UserAdmin', 'description' => 'User Administrator']);

        // Assign roles to users
        $jane->roles()->sync([$userAdmin->id]);
        $bob->roles()->sync([$userAdmin->id]);
        $susan->roles()->sync([$userAdmin->id]);
    }
}
