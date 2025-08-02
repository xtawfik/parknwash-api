<?php

namespace App\Containers\Mall\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Country\Models\Country;
use App\Containers\User\Models\User;
use App\Containers\Park\Models\Park;
use App\Containers\Area\Models\Area;


class Mall extends Model
{
  protected $fillable = [
    #Fillables#
    'user_id',
    'country_id',
    'name_en',
    'name_ar',
    'area_id',
    'active',
    'latitude',
    'longitude',
    'boundaries'
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
  protected $resourceKey = 'malls';
  protected $table = 'mall';

  public function country()
  {
    return $this->belongsTo(Country::class, 'country_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function parks()
  {
    return $this->hasMany(Park::class, 'mall_id');
  }

  public function area()
  {
    return $this->belongsTo(Area::class, 'area_id');
  }


}

