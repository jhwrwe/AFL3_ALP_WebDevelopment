<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
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
        DB::table('statuses')->insert([
            'status'=>'ongoing'
            ]);
            DB::table('roles')->insert([
                'role_name'=>'Admin'
                ]);
                DB::table('roles')->insert([
                    'role_name'=>'Staff'
                ]);
                DB::table('roles')->insert([
                        'role_name'=>'User'
                ]);

    }
}
