<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_titles')->insert([
            [
                'job_title'=>'CEO'
            ],
            [
                'job_title'=>'Marketee'
            ],
            [
                'job_title'=>'Infographist'
            ],
            [
                'job_title'=>'Writer'
            ],
            [
                'job_title'=>'Assistant'
            ],
            [
                'job_title'=>'Office Manager'
            ],
        ]);
    }
}
