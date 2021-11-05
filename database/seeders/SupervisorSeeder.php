<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('supervisors')->insert([
            'supervisor_name' => 'Raden Nanda Teguh Perkasa'
        ]);

        DB::table('supervisors')->insert([
            'supervisor_name' => 'Ginanjar Adhitia'
        ]);

        DB::table('supervisors')->insert([
            'supervisor_name' => 'Bayu Hendra Winata'
        ]);
    }
}
