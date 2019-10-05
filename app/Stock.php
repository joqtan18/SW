<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $table = 'stock';
  protected $primaryKey = 'prod_id';
  public $timestamps = false;
  protected $fillable = [	
    	'prod_nombre',
      	'prod_stock',
      	'detalle',
   		'cat_id'
      	
  ];
  protected $guarded = [];
}
