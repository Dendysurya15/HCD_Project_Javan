<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('leave_catergories')->insert([
            'name' => 'Maternity Leave'
        ]);
        DB::table('leave_catergories')->insert([
            'name' => 'Marriage Leave'
        ]);
        DB::table('leave_catergories')->insert([
            'name' => 'Sick Leave'
        ]);
    }
}
