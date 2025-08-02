<?php

namespace App\Containers\JobDescription\Models;

use App\Ship\Parents\Models\Model;

#use#

class JobDescription extends Model {
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
  protected $resourceKey = 'jobdescriptions';
  protected $table = 'job_description';

  #relations#
}

