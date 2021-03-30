<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idingreso');
            $table->foreign('idingreso')->references('id')->on('ingreso');
            $table->unsignedBigInteger('idarticulo');
            $table->foreign('idarticulo')->references('id')->on('articulo');
            $table->integer('cantidad');
            $table->decimal('precio_compra', $precision = 11, $scale = 2);
            $table->decimal('precio_venta', $precision = 11, $scale = 2);
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
        Schema::dropIfExists('detalle_ingreso');
    }
}
