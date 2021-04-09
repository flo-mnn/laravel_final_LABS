<?php

namespace Database\Seeders;

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
            [
                'name'=>"Lou Mary",
                'email'=>"admin@gmail.com",
                'password'=>Hash::make('password'),
                'src'=>'1.jpg',
                'description'=>"Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.",
                'role_id'=>1,
                'validated'=>true,
                'created_at'=>now(),
            ],
            [
                'name'=>"Johanna Smith",
                'email'=>"webmaster@gmail.com",
                'password'=>Hash::make('password'),
                'src'=>'2.jpg',
                'description'=>"Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.",
                'role_id'=>2,
                'validated'=>true,
                'created_at'=>now(),
            ],
            [
                'name'=>"Johan Smith",
                'email'=>"writer@gmail.com",
                'password'=>Hash::make('password'),
                'src'=>'3.jpg',
                'description'=>"Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.",
                'role_id'=>3,
                'validated'=>true,
                'created_at'=>now(),
            ],
            [
                'name'=>"Member",
                'email'=>"member@gmail.com",
                'password'=>Hash::make('password'),
                'src'=>'1.jpg',
                'description'=>"Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique.",
                'role_id'=>4,
                'validated'=>true,
                'created_at'=>now(),
            ],
        ]);
    }
}
