<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'src'=>'big-logo.png'
            ],
            [
                'src'=>'overlay.png'
            ],
            [
                'src'=>'test-man.png'
            ],
            [
                'src'=>'device.png'
            ],
            [
                'src'=>'video.jpg'
            ],
        ]);
    }
}
