<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Stmt\Enum_;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->unsignedBigInteger('kategori_id');
            $table->string('foto_menu');
            $table->integer('stock');
            $table->double('harga');
            $table->char('deskripsi');
            $table->timestamp('time')->default(now());
            $table->timestamps();

            $table->foreign('kategori_id')
            ->references('id')
            ->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
