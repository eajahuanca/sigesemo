<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichatecnica extends Model
{
    protected $table = 'fichatecnica';
    protected $fillable = [
        'id',
        'iddocumentos',
        'pertinencia',
        'mag_region',
        'mag_superficie',
        'mag_investigacion',
        'mag_suplapaz',
        'mag_suplapazp',
        'mag_suporuro',
        'mag_suporurop',
        'mag_suppotosi',
        'mag_suppotosip',
        'mag_supcochabamba',
        'mag_supcochabambap',
        'mag_supsantacruz',
        'mag_supsantacruzp',
        'mag_supchuquisaca',
        'mag_supchuquisacap',
        'mag_suptarija',
        'mag_suptarijap',
        'mag_suppando',
        'mag_suppandop',
        'mag_supbeni',
        'mag_supbenip',
        'mag_supnacional',
        'mag_supnacionalp',
        'com_infraestructura',
        'com_infraestructura_val',
        'com_produccion',
        'com_produccion_val',
        'com_forestacion',
        'com_forestacion_val',
        'com_plantaciones',
        'com_plantaciones_val',
        'com_capacidades',
        'com_capacidades_val',
        'com_investigacion',
        'com_investigacion_val',
        'com_tecnologia',
        'com_tecnologia_val',
        'com_manejo',
        'com_manejo_val',
        'cob_deptos',
        'cob_municipio_total',
        'cob_municipio_abarca',
        'cob_comunidad_total',
        'cob_comunidad_abarca',
        'cob_observaciones',
        'created_at',
        'updated_at',
        'idregistra',
        'idactualiza'
    ];

    public function userRegistra(){
        return $this->belongsTo('App\User','idregistra', 'id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','idactualiza', 'id');
    }

    public function documentos(){
        return $this->belongsTo('App\Previous', 'iddocumentos', 'id');
    }
}
