<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanaanPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanaan_pembelian', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('tipe_pekerjaan_id')->unsigned()->nullable();
            $table->decimal('jumlah',10,2);
            $table->foreign('tipe_pekerjaan_id')->references('id')->on('tipe_pekerjaan')->onDelete('cascade');
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
        Schema::dropIfExists('pesanaan_pembelian');
    }
}
