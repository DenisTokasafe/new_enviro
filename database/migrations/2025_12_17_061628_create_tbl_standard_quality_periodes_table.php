<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStandardQualityPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_standard_quality_periodes', function (Blueprint $table) {
            $table->id();
            $table->string('tss_standard')->default('0');
            $table->string('do_standard')->default('0');
            $table->string('redox_standard')->default('0');
            $table->string('conductivity_standard')->default('0');
            $table->string('temperatur_standard')->default('0');
            $table->string('ph_min_standard')->default('0');
            $table->string('ph_max_standard')->default('0');
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
        Schema::dropIfExists('tbl_standard_quality_periodes');
    }
}
