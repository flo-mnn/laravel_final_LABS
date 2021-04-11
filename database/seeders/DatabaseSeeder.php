<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            JobTitleSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PostAutoValidateSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            CarouselSeeder::class,
            SubjectSeeder::class,
            ContactSeeder::class,
            FooterSeeder::class,
            PictureSeeder::class,
            MapSeeder::class,
            NavlinkSeeder::class,
            OfficeSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
            TitleSeeder::class,
            VideoSeeder::class,
            JobTitleUserSeeder::class,
            TagPostSeeder::class,
            AboutSeeder::class,
            FlaticonSeeder::class,
            ContactEmailSeeder::class,
            PolyvalentToggleSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
