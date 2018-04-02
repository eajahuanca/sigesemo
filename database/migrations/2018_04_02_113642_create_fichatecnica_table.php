<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichatecnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichatecnica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('iddocumentos')->unsigned();
            $table->string('per_agenda')->nullable();
            $table->string('per_pdes')->nullable();
            $table->string('per_psdi')->nullable();
            $table->string('per_pei')->nullable();
            $table->string('per_agenda')->nullable();
            $table->string('per_guia')->nullable();
            $table->string('mag_reg_andino')->nullable();
            $table->string('mag_reg_valle')->nullable();
            $table->string('mag_reg_chaco')->nullable();
            $table->string('mag_reg_chiquitania')->nullable();
            $table->string('mag_reg_amazonia')->nullable();
            $table->string('mag_sup_proteccion')->nullable();
            $table->string('mag_sup_silvicultura')->nullable();
            $table->string('mag_sup_saff')->nullable();
            $table->string('mag_sup_comercial')->nullable();
            $table->string('mag_inv_basica')->nullable();
            $table->string('mag_inv_aplicada')->nullable();
            $table->string('com_infraestructura')->nullable();
            $table->decimal('com_infraestructura_val',18,2)->nullable();
            $table->string('com_produccion')->nullable();
            $table->decimal('com_produccion_val',18,2)->nullable();
            $table->string('com_forestacion')->nullable();
            $table->decimal('com_forestacion_val',18,2)->nullable();
            $table->string('com_plantaciones')->nullable();
            $table->decimal('com_plantaciones_val',18,2)->nullable();
            $table->string('com_capacidades')->nullable();
            $table->decimal('com_capacidades_val',18,2)->nullable();
            $table->string('com_investigacion')->nullable();
            $table->decimal('com_investigacion_val',18,2)->nullable();
            $table->string('com_tecnologia')->nullable();
            $table->decimal('com_tecnologia_val',18,2)->nullable();
            $table->string('com_manejo')->nullable();
            $table->decimal('com_manejo_val',18,2)->nullable();
            
            
            $table->timestamps();

            $table->foreign('iddocumentos')->references('id')->on('documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fichatecnica');
    }
}
