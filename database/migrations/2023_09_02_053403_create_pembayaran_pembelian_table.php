<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_pembelian', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('tagihan_id')->unsigned()->nullable();
            $table->decimal('jumlah',10,2);
            $table->foreign('tagihan_id')->references('id')->on('tagihan')->onDelete('cascade');
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
        Schema::dropIfExists('pembayaran_pembelian');
    }
}
