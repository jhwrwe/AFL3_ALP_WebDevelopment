<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "Admin222313131@gmail.com",
            'password'=> bcrypt('12345'),
            'role_id'=> 1,
            'is_login'=>'0',
            'is_active'=>'1',
            'photo'=> "images/ESHAbRJx2WFiyEuVLSoZ8oTbUFvlrhltvFgD7pGm.png",
            'gender'=>'male',
            'no_telp'=>'310313013012313131'
        ]);
    }
}
