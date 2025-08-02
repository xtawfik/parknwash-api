<?php

namespace App\Containers\Category\Models;

use App\Containers\Country\Models\Country;
use App\Ship\Parents\Models\Model;


class Category extends Model {
  protected $fillable = [
    #Fillables#
    'name_en',
    'name_ar',
    'sorter',
    'direct'
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
  protected $resourceKey = 'categories';
  protected $table = 'category';

  public function countries() {
    return $this->belongsToMany( Country::class, 'category_country', 'category_id', 'country_id' );
  }


}

