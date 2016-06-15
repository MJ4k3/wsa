<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
      'user_id',
      'paid',
      'status',
      'created_at',
      'price',
      'billplz_id',
      'billplz_url',
    ];
    public function cart_item(){
      return $this->hasMany('App\Cart_Item');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
}
