<?php

namespace Database\Seeders;

use App\Models\EmployeeMaster;
use App\Models\PersonalInformation;
use App\Models\RelatedInformation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EmployeeMaster::create([
            'is_admin' => 1,
            'first_name' => 'Super Admin',
            'email' => 'admin@super',
            'password' => Hash::make('12345')
        ]);

        EmployeeMaster::create([
            'first_name' => 'Hannah',
            'middle_name' => 'Afifah',
            'last_name' => 'Afril',
            'job_title_id' => '7',
            'sub_unit_id' => '3',
            'supervisor_id' => '2',
            'status_id' => '2',
            'employee_id' => 12314,
            'email' => 'Hannah201@javan.corp',
            'password' => Hash::make('08201')
        ]);

        PersonalInformation::create([
            'id_master' => 2,
            'first_name' => 'Hannah',
            'middle_name' => 'Afifah',
            'last_name' => 'Afril',
        ]);

        RelatedInformation::create([
            'id_master' => 2
        ]);
    }
}
