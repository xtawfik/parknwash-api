<?php

namespace App\Containers\Park\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;


class Park extends Model
{
  protected $fillable = [
    #Fillables#
    'mall_id',
    'park',
    'rows_count',
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
  protected $resourceKey = 'parks';
  protected $table = 'park';

  public function mall()
  {
    return $this->belongsTo(Mall::class, 'mall_id');
  }


}

