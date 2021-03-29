<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'icon'=>"flaticon-023-flask",
                'title'=>"Get in the lab",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
            [
                'icon'=>"flaticon-011-compass",
                'title'=>"Projects Online",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
            [
                'icon'=>"flaticon-037-idea",
                'title'=>"Smart Marketing",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
            [
                'icon'=>"flaticon-039-vector",
                'title'=>"Social Media",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
            [
                'icon'=>"flaticon-036-brainstorming",
                'title'=>"Brainstorming",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
            [
                'icon'=>"flaticon-036-search",
                'title'=>"Documented",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
            [
                'icon'=>"flaticon-018-laptop",
                'title'=>"Responsive",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
            [
                'icon'=>"flaticon-043-sketch",
                'title'=>"Retina Ready",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
            [
                'icon'=>"flaticon-012-cube",
                'title'=>"Ultra Modern",
                'text'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla..',
                'created_at'=>now(),
            ],
        ]);
    }
}
