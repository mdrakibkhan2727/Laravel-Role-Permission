<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          [
              'name'=>'Md Rakib Khan',
              'email'=>'admin123@gmail.com',
              'password'=>Hash::make(12345678)
          ]
        ]);
    }
}
