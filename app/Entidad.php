<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'entidades';
    protected $fillable = [
        'id',
        'ent_nombre',
        'ent_descripcion',
        'ent_estado',
        'created_at',
        'updated_at'
    ];

    public function previous(){
        return $this->hasMany('App\Previous');
    }
}
