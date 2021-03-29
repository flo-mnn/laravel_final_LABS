<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTitleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_title_user')->insert([
            [
                'user_id'=>1,
                'job_title_id'=>1,
            ],
            [
                'user_id'=>1,
                'job_title_id'=>2,
            ],
            [
                'user_id'=>2,
                'job_title_id'=>3,
            ],
            [
                'user_id'=>2,
                'job_title_id'=>5,
            ],
            [
                'user_id'=>3,
                'job_title_id'=>4,
            ],
            [
                'user_id'=>3,
                'job_title_id'=>6,
            ],
        ]);
    }
}
