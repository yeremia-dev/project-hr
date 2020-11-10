<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kontrak_id');
            $table->date('tanggal_pengingat');
            $table->integer('batasan_pengingat');
            $table->boolean('is_confirm')->default(0);
            $table->boolean('is_sent')->default(0);
            $table->boolean('is_done')->default(0);
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
        Schema::dropIfExists('reminders');
    }
}
