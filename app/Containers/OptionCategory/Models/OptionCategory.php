<?php

namespace App\Containers\OptionCategory\Models;

use App\Ship\Parents\Models\Model;

#use#

class OptionCategory extends Model {
  protected $fillable = [
    #Fillables#
    'type',
    'name_en',
    'name_ar',
    'description_en',
    'description_ar'
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
  protected $resourceKey = 'optioncategories';
  protected $table = 'option_category';

  #relations#
}

