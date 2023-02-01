<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Secret123.'),
            'type_user' => 1
        ]);
        DB::table('users')->insert([
            'name' => 'cliente1',
            'email' => 'cliente1@gmail.com',
            'password' => Hash::make('Secret123.'),
            'type_user' => 2
        ]);
    }
}
