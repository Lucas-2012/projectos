<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendedorMercadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendedor_mercados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mercado_id')->constrained('mercados')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vendedor_id')->constrained('vendedors')->onDelete('cascade')->onUpdate('cascade');            
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
        Schema::dropIfExists('vendedor_mercados');
    }
}
