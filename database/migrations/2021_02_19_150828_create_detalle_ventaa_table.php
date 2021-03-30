<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventaa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idventa');
            $table->foreign('idventa')->references('id')->on('ventaa');
            $table->unsignedBigInteger('idarticulo');
            $table->foreign('idarticulo')->references('id')->on('articulo');
            $table->integer('cantidad');
            $table->decimal('precio_venta', $precision = 11, $scale = 2);
            $table->decimal('descuento', $precision = 11, $scale = 2);
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
        Schema::dropIfExists('detalle_ventaa');
    }
}
