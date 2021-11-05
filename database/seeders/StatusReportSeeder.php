<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_reports')->insert([
            'name' => 'Belum Diperiksa'
        ]);
        DB::table('status_reports')->insert([
            'name' => 'Diterima'
        ]);
        DB::table('status_reports')->insert([
            'name' => 'Ditolak'
        ]);
    }
}
