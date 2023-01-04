<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Sponsor',
            'email' => 'sponsor@email.com',
            'password' => Hash::make('password123'),
            'role' => 'sponsor',
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}
