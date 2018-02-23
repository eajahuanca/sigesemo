<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programas';
    protected $fillable = [
        'id',
        'pro_sigla',
        'pro_nombre',
        'pro_estado',
        'idregistra',
        'idactualiza',
        'created_at',
        'updated_at'
    ];

    public function userRegistra(){
        return $this->belongTo('App\User', 'idregistra', 'id');
    }

    public function userActualiza(){
        return $this->belongTo('App\User', 'idactualiza', 'id');
    }
}
