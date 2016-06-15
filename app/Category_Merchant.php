<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Merchant extends Model
{
    protected $table = 'category_merchants';
    protected $fillable = [
      'merchant_id',
      'category_id',
    ];
}
