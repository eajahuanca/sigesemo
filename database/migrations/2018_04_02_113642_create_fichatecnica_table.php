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
            $table->string('pertinencia')->nullable();
            $table->string('mag_region')->nullable();
            $table->string('mag_superficie')->nullable();
            $table->string('mag_investigacion')->nullable();
            $table->decimal('mag_suplapaz',18,2)->default(0);
            $table->decimal('mag_suplapazp',18,2)->default(0);
            $table->decimal('mag_suporuro',18,2)->default(0);
            $table->decimal('mag_suporurop',18,2)->default(0);
            $table->decimal('mag_suppotosi',18,2)->default(0);
            $table->decimal('mag_suppotosip',18,2)->default(0);
            $table->decimal('mag_supcochabamba',18,2)->default(0);
            $table->decimal('mag_supcochabambap',18,2)->default(0);
            $table->decimal('mag_supsantacruz',18,2)->default(0);
            $table->decimal('mag_supsantacruzp',18,2)->default(0);
            $table->decimal('mag_supchuquisaca',18,2)->default(0);
            $table->decimal('mag_supchuquisacap',18,2)->default(0);
            $table->decimal('mag_suptarija',18,2)->default(0);
            $table->decimal('mag_suptarijap',18,2)->default(0);
            $table->decimal('mag_suppando',18,2)->default(0);
            $table->decimal('mag_suppandop',18,2)->default(0);
            $table->decimal('mag_supbeni',18,2)->default(0);
            $table->decimal('mag_supbenip',18,2)->default(0);
            $table->decimal('mag_supnacional',18,2)->default(0);
            $table->decimal('mag_supnacionalp',18,2)->default(0);
                       
            $table->string('com_infraestructura')->nullable();
            $table->decimal('com_infraestructura_val',18,2)->default(0);
            $table->string('com_produccion')->nullable();
            $table->decimal('com_produccion_val',18,2)->default(0);
            $table->string('com_forestacion')->nullable();
            $table->decimal('com_forestacion_val',18,2)->default(0);
            $table->string('com_plantaciones')->nullable();
            $table->decimal('com_plantaciones_val',18,2)->default(0);
            $table->string('com_capacidades')->nullable();
            $table->decimal('com_capacidades_val',18,2)->default(0);
            $table->string('com_investigacion')->nullable();
            $table->decimal('com_investigacion_val',18,2)->default(0);
            $table->string('com_tecnologia')->nullable();
            $table->decimal('com_tecnologia_val',18,2)->default(0);
            $table->string('com_manejo')->nullable();
            $table->decimal('com_manejo_val',18,2)->default(0);
            $table->string('cob_deptos')->nullable();
            $table->integer('cob_municipio_total')->default(0);
            $table->integer('cob_municipio_abarca')->default(0);
            $table->integer('cob_comunidad_total')->default(0);
            $table->integer('cob_comunidad_abarca')->default(0);
            $table->text('cob_observaciones')->nullable();
            $table->integer('idregistra')->unsigned();
            $table->integer('idactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('iddocumentos')->references('id')->on('documentos');
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
        Schema::dropIfExists('fichatecnica');
    }
}
