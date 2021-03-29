<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('testimonials')->insert([
            [
                'name'=>"John Smith",
                'job_title'=>"UX Designer",
                'text'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.",
                'src'=>'/avatar/01.jpg',
            ],
            [
                'name'=>"Johanna Smith",
                'job_title'=>"Web Dev",
                'text'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.",
                'src'=>'/avatar/01.jpg',
            ],
            [
                'name'=>"Lou Mary",
                'job_title'=>"CEO Company",
                'text'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.",
                'src'=>'/avatar/01.jpg',
            ],
            [
                'name'=>"John Smith",
                'job_title'=>"UX Designer",
                'text'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.",
                'src'=>'/avatar/01.jpg',
            ],
            [
                'name'=>"Johanna Smith",
                'job_title'=>"Web Dev",
                'text'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.",
                'src'=>'/avatar/01.jpg',
            ],
            [
                'name'=>"Lou Mary",
                'job_title'=>"CEO Company",
                'text'=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequa.",
                'src'=>'/avatar/01.jpg',
            ],
        ]);
    }
}
