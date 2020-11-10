<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemajuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kontrak_id');
            $table->text('isi_kemajuan');
            $table->date('tanggal_kemajuan');
            $table->timestamps();
            $table->foreign('kontrak_id')->references('id')->on('kontraks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kemajuans');
    }
}
