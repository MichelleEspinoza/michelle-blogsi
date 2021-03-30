<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventaa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idcliente');
            $table->foreign('idcliente')->references('id')->on('persona');
            $table->string('tipo_comprobante',20);
            $table->string('serie_comprobante',7);
            $table->string('num_comprobante',10);
              // $table->dateTime('fecha_hora ', $precision = 0); es lo mismo que timestamps
            $table->decimal('impuesto', $precision = 4, $scale = 2);
            $table->decimal('total_venta', $precision = 11, $scale = 2);
            $table->string('estado',20);
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
        Schema::dropIfExists('venta');
    }
}
