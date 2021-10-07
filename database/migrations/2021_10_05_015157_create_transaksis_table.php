<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesanan');
            $table->enum('status_transaksi', ['sukses', 'gagal']);
            $table->enum('metode_pembayaran', ['cash', 'atm']);
            $table->timestamp('time')->default(now());
            $table->integer('id_user');
            $table->timestamps();

            $table->foreign('id_pesanan')
            ->references('id')
            ->on('pesanans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
