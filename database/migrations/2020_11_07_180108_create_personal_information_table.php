<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_master')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender', array('male', 'female'))->nullable();
            $table->string('place_of_birth', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('marital_status', array('single', 'married'))->nullable();;
            $table->string('nationality')->nullable();
            $table->integer('other_id')->nullable();
            $table->integer('driver_license_number')->nullable();
            $table->string('license_expire_date')->nullable();
            $table->string('image')->nullable();
            $table->foreign('id_master')->references('id')->on('employee_masters');
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
        Schema::dropIfExists('personal_information');
    }
}
