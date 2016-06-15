<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Merchant extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];
    protected $table = 'merchants';
    protected $fillable = [
      'name',
      'email',
      'address',
      'facebook',
      'instagram',
      'service',
      'description',
      'logo',
      'verify'
    ];
    public function picture(){
      return $this->hasMany('App\Picture','merchant_id' , 'id');
    }
    public function operating(){
      return $this->hasOne('App\Operating' ,'merchant_id' , 'id');
    }
    public function product(){
      return $this->hasMany('App\Product', 'merchant_id' , 'id');
    }

}
