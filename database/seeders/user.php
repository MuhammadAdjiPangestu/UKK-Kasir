<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'cobot',
            'email'    => 'cobot@gmail.com',
            'password'   => '12345678',
            'role'          => 'admin',
        ]
        );
    }
}
