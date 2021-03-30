<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idcategoria');
            $table->foreign('idcategoria')->references('id')->on('categoria');
            $table->string('codigo',50);
            $table->string('nombre',100);
            $table->integer('stock');
            $table->text('descripcion');
            $table->string('imagen',50);
            $table->string('estado',50);
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
        Schema::dropIfExists('articulo');
    }
}
