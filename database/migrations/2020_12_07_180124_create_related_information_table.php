<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatedInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_information', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_master')->nullable();
            $table->string('telegram', 20)->nullable();
            $table->string('linkedin', 20)->nullable();
            $table->string('facebook', 20)->nullable();
            $table->string('instagram', 20)->nullable();
            $table->integer('bpjs_kesehatan')->nullable();
            $table->integer('bpjs_ketenagakerjaan')->nullable();
            $table->enum('gol_darah', array('A', 'B', 'AB', 'O'))->nullable();
            $table->integer('no_ijazah')->nullable();
            $table->integer('no_kk')->nullable();
            $table->integer('npwp')->nullable();
            $table->integer('rek_payroll')->nullable();
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
        Schema::dropIfExists('related_information');
    }
}
