<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_Item extends Model
{
    protected $table = 'cart_items';
    protected $fillable = [
      'cart_id',
      'product_id',
      'book_date',
      'book_time',
    ];
    public function cart(){
      return $this->belongsTo('App\Cart');
    }
    public function product(){
      return $this->belongsTo('App\Product');
    }
}
