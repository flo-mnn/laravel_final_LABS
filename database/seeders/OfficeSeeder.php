<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            "title"=>"Main Office",
            'street'=>"Place de la Minoterie",
            'number'=>"10",
            'postcode'=>"1080",
            'city'=>"Brussels",
            'phone'=>"0034 37483 2445 322",
            'email'=>"hello@company.com",
        ]);
    }
}
