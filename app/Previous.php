<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use File;
use Storage;
//dcumentos
class Previous extends Model
{
    protected $table = 'documentos';
    protected $fillable = [
        'id',
        'cus',
        'pre_sigechr',
        'pre_depto',
        'identidad',
        'pre_nota',
        'pre_nota_nombre',
        'pre_nota_check',
        'pre_ficha',
        'pre_ficha_nombre',
        'pre_ficha_check',
        'pre_legal',
        'pre_legal_nombre',
        'pre_legal_check',
        'pre_estado',
        'pre_obs',
        'idregistra',
        'idactualiza',
        'created_at',
        'updated_at'
    ];

    public function setPreNotaAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['pre_nota'] = 'archivo/previous/nota/'.$nuevoArchivo;
            $storage = Storage::disk('nota')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['pre_nota_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function setPreFichaAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['pre_ficha'] = 'archivo/previous/ficha/'.$nuevoArchivo;
            $storage = Storage::disk('ficha')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['pre_ficha_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function setPreLegalAttribute($archivo){
        if($archivo){
            $nuevoArchivo = Carbon::now()->year.
                            Carbon::now()->month.
                            Carbon::now()->day. "-".
                            Carbon::now()->hour.
                            Carbon::now()->minute.
                            Carbon::now()->second.".".
                            $archivo->getClientOriginalExtension();
            $this->attributes['pre_legal'] = 'archivo/previous/legal/'.$nuevoArchivo;
            $storage = Storage::disk('legal')->put($nuevoArchivo, \File::get($archivo));
            $this->attributes['pre_legal_nombre'] = $archivo->getClientOriginalName();
        }
    }

    public function userRegistra(){
        return $this->belongsTo('App\User','idregistra', 'id');
    }

    public function userActualiza(){
        return $this->belongsTo('App\User','idactualiza', 'id');
    }
}
