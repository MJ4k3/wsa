<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
      'merchant_id',
      'category_id',
      'name',
      'price',
      'promotion',
      'duration',
      'service'
    ];
    public function merchant(){
      return $this->belongsTo('App\Merchant', 'merchant_id');
    }
    public function category(){
      return $this->belongsTo('App\Category', 'category_id');
    }
    public function cart_item(){
      return $this->hasMany('App\Cart_Item');
    }
}
