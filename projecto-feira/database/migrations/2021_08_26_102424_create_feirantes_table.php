<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeirantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feirantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pais_id')->constrained('pais')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('provincias_id')->constrained('provincias')->onDelete('cascade')->onUpdate('cascade');
            $table->string('telefone')->unique();
            $table->text('preco')->nullable();
            $table->text('video')->nullable();
            $table->string('produtos');
            $table->bigInteger('visitas')->nullable();
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
        Schema::dropIfExists('feirantes');
    }

}
