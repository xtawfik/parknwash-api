<?php

namespace App\Containers\CarModel\Models;

use App\Ship\Parents\Models\Model;

#use#

class CarModel extends Model {
  protected $fillable = [
    #Fillables#
    'name',
    'logo',
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

  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'carmodels';
  protected $table = 'car_model';

  #relations#
}

