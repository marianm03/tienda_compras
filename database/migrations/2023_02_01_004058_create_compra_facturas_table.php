<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_facturas', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('factura');
            $table->unsignedBigInteger('compra');
            $table->foreign('factura')->references('id')->on('facturas');
            $table->foreign('compra')->references('id')->on('compras');
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
        Schema::dropIfExists('compra_facturas');
    }
};
