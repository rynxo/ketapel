<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelangganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namaPelanggan', 50);
            $table->bigInteger('id_layanan')->unsigned();
            $table->string('alamatPelanggan', 100);
            $table->string('email', 50)->unique();
            $table->string('noHp', 15);
            $table->string('fotoRumah', 100);
            $table->timestamps();
        });

        Schema::table('pelanggan', function (Blueprint $table) {
            $table->foreign('id_layanan')->references('id')->on('layanan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggan');
    }
}
