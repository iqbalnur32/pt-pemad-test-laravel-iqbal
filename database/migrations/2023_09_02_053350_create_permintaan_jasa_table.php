<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanJasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_jasa', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('pekerjaan_id')->unsigned()->nullable();
            $table->integer('proyek_id')->unsigned()->nullable();
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan')->onDelete('cascade');;		
            $table->foreign('proyek_id')->references('id')->on('proyek')->onDelete('cascade');;
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
        Schema::dropIfExists('permintaan_jasa');
    }
}
