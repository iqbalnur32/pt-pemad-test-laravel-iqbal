<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaranJasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawaran_jasa', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('pekerjaan_id')->unsigned()->nullable();
            $table->integer('proyek_id')->unsigned()->nullable();
            $table->decimal('harga',10,2);
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
        Schema::dropIfExists('penawaran_jasa');
    }
}
