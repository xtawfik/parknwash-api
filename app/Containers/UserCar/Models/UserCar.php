<?php

namespace App\Containers\UserCar\Models;

use App\Containers\CarModel\Models\CarModel;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

#use#

class UserCar extends Model
{
  protected $fillable = [
    #Fillables#
    'car_model_id',
    'plate_number',
    'plate_code',
    'name',
    'car_type',
    'country_slug',
    'user_id'
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
  protected $resourceKey = 'usercars';
  protected $table = 'user_car';

  public function carModel()
  {
    return $this->belongsTo(CarModel::class, 'car_model_id');
  }

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}

