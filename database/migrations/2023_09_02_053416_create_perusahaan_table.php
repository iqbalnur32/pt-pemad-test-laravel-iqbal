<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('email',200);
            $table->string('bank',200)->nullable();
            $table->string('bank_name',200)->nullable();
            $table->string('bank_rekening',200)->nullable();
            $table->string('nama',100);
            $table->string('jenis',100);
            $table->string('nilai',200);
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
        Schema::dropIfExists('perusahaan');
    }
}
