<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carousels')->insert([
            [
                'subtitle'=>'Get your freebie template now!',
                'src'=>'01.jpg',
            ],
            [
                'subtitle'=>'Get your freebie template now!',
                'src'=>'02.jpg',
            ],
        ]);
    }
}
