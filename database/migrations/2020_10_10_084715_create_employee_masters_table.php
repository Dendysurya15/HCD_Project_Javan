<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_masters', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(0);
            $table->boolean('status_account')->default(1);
            $table->string('first_name', 20)->nullable();
            $table->string('middle_name', 20)->nullable();
            $table->string('last_name', 20)->nullable();
            $table->integer('employee_id')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->unsignedBigInteger('job_title_id')->nullable();
            $table->unsignedBigInteger('sub_unit_id')->nullable();
            $table->foreign('status_id')->references('id')->on('status_employees');
            $table->foreign('supervisor_id')->references('id')->on('supervisors');
            $table->foreign('job_title_id')->references('id')->on('jobtitles');
            $table->foreign('sub_unit_id')->references('id')->on('sub_units');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_masters');
    }
}
