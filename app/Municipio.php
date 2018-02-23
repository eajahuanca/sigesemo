<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios';
    protected $fillable = [
        'id',
        'mun_depto',
        'mun_municipio',
        'mun_descripcion',
        'mun_estado',
        'mun_obs',
        'idregistra',
        'idactualiza',
        'created_at',
        'updated_at'
    ];

    public function userRegistra(){
        return $this->belongsTo('App\User', 'idregistra', 'id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User', 'idactualiza', 'id');
    }
}
