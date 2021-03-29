<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavlinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('navlinks')->insert([
            [
                'link'=>'home'
            ],
            [
                'link'=>'services'
            ],
            [
                'link'=>'blog'
            ],
            [
                'link'=>'contact'
            ],
        ]);
    }
}
