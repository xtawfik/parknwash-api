<?php

namespace App\Containers\GeneralOption\Models;

use App\Ship\Parents\Models\Model;

#use#

class GeneralOption extends Model
{
  protected $fillable = [
    #Fillables#
    'name',
    'name_en',
    'name_ar',
    'description',
    'path',
    'sorter',
    'code'
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
  protected $resourceKey = 'generaloptions';
  protected $table = 'general_option';

  #relations#
}

