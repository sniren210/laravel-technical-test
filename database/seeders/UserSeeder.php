<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$CnJQwrh/Pe2QoveOCrGgWuEwPLHJ0SLQqdyp9CYDXIdsamc3MN2.6', //admin123
            'created_at' => '2023-01-10 09:34:50',
            'updated_at' => '2023-01-10 09:34:50'
        ]);
    }
}
