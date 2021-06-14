<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleFacturas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('factura_id')->unsigned();
            $table->foreign('factura_id')
                    ->references('id')
                    ->on('facturas')->onDelete('cascade');
            $table->bigInteger('producto_id')->unsigned();
            $table->foreign('producto_id')
                    ->references('id')
                    ->on('productos');
            $table->integer('cantidad');        
            $table->decimal('precio',10,2);
	        $table->decimal('itemTotal',10,2);
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
        Schema::dropIfExists('detalleFacturas');
    }
}
