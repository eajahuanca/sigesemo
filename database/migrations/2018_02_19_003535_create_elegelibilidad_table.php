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
            $table->integer('iddocumento')->unsigned();
            $table->string('ele_finanza', 200)->nullable();
            $table->string('ele_finanza_nombre', 200)->nullable();
            $table->boolean('ele_finanza_check')->default(false);
            $table->text('ele_obsfinanza')->nullable();
            $table->datetime('ele_finregistra')->nullable();
            $table->datetime('ele_finactualiza')->nullable();
            $table->integer('idfinanciero_registra')->unsigned();
            $table->integer('idfinanciero_actualiza')->unsigned();
            $table->enum('ele_estadofinanza', ['ACEPTADO','PENDIENTE','RECHAZADO']);

            $table->string('ele_tecnica', 200)->nullable();
            $table->string('ele_tecnica_nombre', 200)->nullable();
            $table->boolean('ele_tecnica_check')->default(false);
            $table->text('ele_obstecnica')->nullable();
            $table->datetime('ele_tecregistra')->nullable();
            $table->datetime('ele_tecactualiza')->nullable();
            $table->integer('idtecnico_registra')->unsigned();
            $table->integer('idtecnico_actualiza')->unsigned();
            $table->enum('ele_estadotecnico', ['SINVALOR','ACEPTADO','PENDIENTE','RECHAZADO']);
            
            $table->string('ele_legal', 200)->nullable();
            $table->string('ele_legal_nombre', 200)->nullable();
            $table->boolean('ele_legal_check')->default(false);
            $table->text('ele_obslegal')->nullable();
            $table->datetime('ele_legregistra')->nullable();
            $table->datetime('ele_legactualiza')->nullable();
            $table->integer('idlegal_registra')->unsigned();
            $table->integer('idlegal_actualiza')->unsigned();
            $table->enum('ele_estadolegal',['SINVALOR','ACEPTADO','PENDIENTE','RECHAZADO']);
        
            $table->timestamps();

            $table->foreign('iddocumento')->references('id')->on('documentos');

            $table->foreign('idfinanciero_registra')->references('id')->on('users');
            $table->foreign('idfinanciero_actualiza')->references('id')->on('users');

            $table->foreign('idtecnico_registra')->references('id')->on('users');
            $table->foreign('idtecnico_actualiza')->references('id')->on('users');

            $table->foreign('idlegal_registra')->references('id')->on('users');
            $table->foreign('idlegal_actualiza')->references('id')->on('users');
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
