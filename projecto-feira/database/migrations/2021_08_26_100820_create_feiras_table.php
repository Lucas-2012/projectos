<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feiras', function (Blueprint $table) {
            $table->id();
            $table->string('designacao')->unique();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->time('horario');
            $table->string('provincia');
            $table->string('endereco');
            $table->string('cartaz_feira');
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
        Schema::dropIfExists('feiras');
    }
}
