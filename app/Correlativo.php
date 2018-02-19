<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correlativo extends Model
{
    protected $table = 'correlativos';
    protected $fillable = [
        'id',
        'cor_cite',
        'cor_valor',
        'cor_gestion',
        'cor_depto',
        'cor_descripcion',
        'cor_estado',
        'created_at',
        'updated_at'
    ];
}
