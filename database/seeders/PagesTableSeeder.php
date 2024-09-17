<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'course_id' => 1, // Adjust this value based on your existing courses
            'page_title' => 'Introduction to Laravel',
            'page_content' => 'This is an introductory page for Laravel.',
            'image' => null,
            'page_number' => 1
        ]);
    }
}
