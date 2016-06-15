<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operating extends Model
{
    protected $table = 'operatings';
    protected $fillable = [
      'merchant_id',
      'day',
      'open',
      'close',
    ];

    public function merchant(){
      return $this->belongsTo('App\Merchant' , 'merchant_id');
    }
}
