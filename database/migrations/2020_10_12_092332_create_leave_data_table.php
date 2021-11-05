<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_master')->nullable();
            $table->unsignedBigInteger('id_leaveCategories')->nullable();
            $table->unsignedBigInteger('id_status_report')->default(1);
            $table->integer('days');
            $table->string('argument', 300);
            $table->foreign('id_master')->references('id')->on('employee_masters');
            $table->foreign('id_status_report')->references('id')->on('status_reports');
            $table->foreign('id_leaveCategories')->references('id')->on('leave_catergories');
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
        Schema::dropIfExists('leave_data');
    }
}
