<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('no_asset')->unique();
            $table->string('nama');
            $table->string('tgl_perolehan');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->string('tgl_service');
            $table->string('tgl_pajak');
            $table->string('tgl_limit');
            $table->integer('id_tipe')->index();
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
        Schema::dropIfExists('assets');
    }
}
