<?php

namespace App\Containers\Nationality\Models;

use App\Ship\Parents\Models\Model;

#use#

class Nationality extends Model
{
  protected $fillable = [
    #Fillables#
    'country_name_en',
    'country_name_ar',
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
  protected $resourceKey = 'nationalities';
  protected $table = 'nationality';

  #relations#
}

