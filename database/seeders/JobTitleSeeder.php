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
        //
        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Head Capital Development (HCD)'
        ]);

        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Senior Analyst'
        ]);

        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Junior Analyst'
        ]);

        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Senior Programmer'
        ]);

        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Tech Lead'
        ]);

        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Project Leader'
        ]);

        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Senior Quality Assurance'
        ]);

        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Junior Quality Asurance'
        ]);

        DB::table('jobtitles')->insert([
            'jobtitle_name' => 'Staff Finance'
        ]);
    }
}
