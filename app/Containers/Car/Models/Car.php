<?php

namespace App\Containers\Car\Models;

use App\Containers\Country\Models\Country;
use App\Ship\Parents\Models\Model;


class Car extends Model {
  protected $fillable = [
    #Fillables#
    'name_en',
    'name_ar',
    'sorter',
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
  protected $resourceKey = 'cars';
  protected $table = 'car';

  public function countries() {
    return $this->belongsToMany( Country::class, 'car_country', 'car_id', 'country_id' );
  }


}

