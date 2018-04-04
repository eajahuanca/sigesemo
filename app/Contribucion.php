<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Contribucion extends Model
{
    protected $table = 'contribuciones';
    protected $fillable = [
        'id',
        'con_depto',
        'con_total',
        'con_desde',
        'con_hasta',
        'con_estado',
        'created_at',
        'updated_at'
    ];

    public function scopeLapaz(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','LA PAZ')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopeOruro(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','ORURO')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopePotosi(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','POTOSI')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopeCochabamba(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','COCHABAMBA')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopeSantacruz(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','SANTA CRUZ')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopeChuquisaca(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','CHUQUISACA')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopeTarija(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','TARIJA')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopeBeni(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','BENI')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopePando(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','PANDO')->select('con_total')->first();
        return $res->con_total;
    }

    public function scopeNacional(){
        $res = DB::table('contribuciones')->where('con_estado','=',1)->where('con_depto','=','NACIONAL')->select('con_total')->first();
        return $res->con_total;
    }
}
