<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table = 'clientes';
  protected $primaryKey = 'cli_id';
  public $timestamps = false;
  protected $fillable = [
      'cli_dni',
      'cli_apellidos',
      'cli_nombres',
      'cli_email',
      'cli_direccion',
      'cli_telefono'
  ];
  protected $guarded = [];
}
