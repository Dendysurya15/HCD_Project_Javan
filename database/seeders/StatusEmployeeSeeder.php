<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_employees')->insert([
            'status_name' => 'Contract'
        ]);

        DB::table('status_employees')->insert([
            'status_name' => 'Freelance'
        ]);

        DB::table('status_employees')->insert([
            'status_name' => 'Internship'
        ]);

        DB::table('status_employees')->insert([
            'status_name' => 'Probation'
        ]);
    }
}
