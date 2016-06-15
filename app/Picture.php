<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table =  'pictures';
    protected $fillable = [
      'merchant_id',
      'image'
    ];
    public function merchant(){
      return $this->belongsTo('App\Merchant', 'merchant_id');
    }
}
