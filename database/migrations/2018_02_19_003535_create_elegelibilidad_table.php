<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElegelibilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elegibles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cus');
            $table->string('ele_sigechr');
            $table->string('ele_finanza', 200)->nullable();
            $table->string('ele_finanza_nombre', 200)->nullable();
            $table->boolean('ele_finanza_check')->default(false);
            $table->string('ele_tecnica', 200)->nullable();
            $table->string('ele_tecnica_nombre', 200)->nullable();
            $table->boolean('ele_tecnica_check')->default(false);
            $table->string('ele_legal', 200)->nullable();
            $table->string('ele_legal_nombre', 200)->nullable();
            $table->boolean('ele_legal_check')->default(false);
            $table->enum('ele_estado',['ACEPTADO','PENDIENTE','RECHAZADO']);
            $table->text('ele_obs')->nullable();
            $table->integer('idregistra')->unsigned();
            $table->integer('idactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idregistra')->references('id')->on('users');
            $table->foreign('idactualiza')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elegibles');
    }
}
