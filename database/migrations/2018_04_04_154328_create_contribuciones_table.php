<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContribucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('con_depto');
            $table->decimal('con_total',18,2);
            $table->integer('con_desde');
            $table->integer('con_hasta');
            $table->boolean('con_estado')->default(true);
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
        Schema::dropIfExists('contribuciones');
    }
}
