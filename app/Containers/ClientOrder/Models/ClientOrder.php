<?php

namespace App\Containers\ClientOrder\Models;

use App\Containers\Country\Models\Country;
use App\Containers\OrderProduct\Models\OrderProduct;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;


class ClientOrder extends Model {
  protected $fillable = [
    #Fillables#
    'user_id',
    'country_id',
    'total',
    'payment_method',
    'address_id',
    'status'
  ];

  protected $attributes = [

  ];

  protected $hidden = [

  ];

  protected $casts = [

  ];

  protected $appends = [

  ];

  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'clientorders';
  protected $table = 'client_order';

  public function user() {
    return $this->belongsTo( User::class, 'user_id' );
  }

  public function country() {
    return $this->belongsTo( Country::class, 'country_id' );
  }

  public function products() {
    return $this->hasMany( OrderProduct::class, 'order_id' );
  }


}

