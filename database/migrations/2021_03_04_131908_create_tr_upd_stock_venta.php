<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTrUpdStockVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_updStockVenta AFTER INSERT ON `detalle_ventaa` 
            FOR EACH ROW BEGIN
	            UPDATE articulo SET stock = stock - NEW.cantidad
	            WHERE articulo.id = NEW.idarticulo;
            END
        ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP TRIGGER tr_updStockVenta");
    }
}
