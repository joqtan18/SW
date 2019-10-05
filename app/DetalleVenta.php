<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalleventas';
    public $timestamps = false;
    protected $fillable = [
        'dv_idventa',
        'dv_idproducto',
        'dv_cantidad',
        'dv_total'
    ];
    protected $guarded = [];
}
