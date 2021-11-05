<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sub_units')->insert([
            'sub_unit_name' => 'Jakarta'
        ]);

        DB::table('sub_units')->insert([
            'sub_unit_name' => 'Bandung'
        ]);

        DB::table('sub_units')->insert([
            'sub_unit_name' => 'Yogyakarta'
        ]);
    }
}
