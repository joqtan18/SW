<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = 'productos';
  protected $primaryKey = 'prod_id';
  public $timestamps = false;
  protected $fillable = [
  	'cat_id',	
    'prod_nombre',
    'prod_slug',
    'prod_descripcion',
    'prod_extract',
      'prod_precio',
      'prod_imagen',
      'prod_visible',
      'prod_stock',
      'created_at',
      'updated_at'
  ];
  protected $guarded = [];
}
