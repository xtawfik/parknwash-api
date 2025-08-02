<?php

namespace App\Containers\StockIn\Models;

use App\Containers\Country\Models\Country;
use App\Containers\Supply\Models\Supply;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;


class StockIn extends Model {
  protected $fillable = [
    #Fillables#
    'created_at',
    'supply_id',
    'quantity',
    'user_id',
    'country_id',
    'price',
    'total',
    'description_en',
    'description_ar',
    'bill_no'
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
    'updated_at',
    'deleted_at',
  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'stockins';
  protected $table = 'stock_in';

  public function supply() {
    return $this->belongsTo( Supply::class, 'supply_id' );
  }

  public function user() {
    return $this->belongsTo( User::class, 'user_id' );
  }

  public function country() {
    return $this->belongsTo( Country::class, 'country_id' );
  }

}

