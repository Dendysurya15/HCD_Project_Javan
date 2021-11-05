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
        // \App\Models\User::factory(10)->create();
        $this->call(StatusEmployeeSeeder::class);
        $this->call(JobTitleSeeder::class);
        $this->call(SupervisorSeeder::class);
        $this->call(SubUnitSeeder::class);
        $this->call(StatusReportSeeder::class);
        $this->call(LeaveCategory::class);
        $this->call(UserSeeder::class);
    }
}
