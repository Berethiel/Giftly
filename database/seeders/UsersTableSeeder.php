<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Chloé',
            'lastname' => 'balmat',
            'email' => 'chloe.balmat@gmail.com',
            'password' => Hash::make('boud1n'),
            'adress' => '853 route de chartreuse',
            'postalCode' => '38340',
            'city' => 'Voreppe',
            'country' => 'France',
        ]);
    }
}
