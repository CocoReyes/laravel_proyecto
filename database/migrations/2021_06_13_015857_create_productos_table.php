<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->bigInteger('proveedor_id')->unsigned();
            $table->foreign('proveedor_id')
                ->references('id')
                ->on('proveedores');
            $table->bigInteger('rubro_id')->unsigned();
            $table->foreign('rubro_id')
                ->references('id')
                ->on('rubros');
            $table->integer('codbarra');
            $table->decimal('costo',10,2);
            $table->decimal('precio',10,2);
            $table->decimal('tasaIva',10,2);
            $table->decimal('impInterno',10,2);
            $table->boolean('iscontrollable');
            $table->integer('existencia');
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
        Schema::dropIfExists('productos');
    }
}
