<?php

namespace App\Containers\Order\Models;

use App\Containers\CarModel\Models\CarModel;
use App\Containers\Country\Models\Country;
use App\Containers\Employee\Models\Employee;
use App\Containers\Mall\Models\Mall;
use App\Containers\OrderCover\Models\OrderCover;
use App\Containers\Park\Models\Park;
use App\Containers\Service\Models\Service;
use App\Containers\User\Models\User;
use App\Containers\UserCar\Models\UserCar;
use App\Ship\Parents\Models\Model;


class Order extends Model {
  protected $fillable = [
    #Fillables#
    'job_card_no',
    'date',
    'country_id',
    'mall_id',
    'user_id',
    'service_id',
    'car_number',
    'payment_method',
    'discount_percent',
    'total',
    'status',
    'park_id',
    'client_id',
    'client_name',
    'client_phone',
    'client_age',
    'is_client',
    'created_at',
    'car_model_id',
    'car_id',
    'slot_number',
    'started_at',
    'ended_at',
    'staff_id',
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
  protected $resourceKey = 'orders';
  protected $table = 'order';

  public function service() {
    return $this->belongsTo( Service::class, 'service_id' );
  }

  public function user() {
    return $this->belongsTo( User::class, 'user_id' );
  }

  // Employee
  public function employee() {
    return $this->belongsTo( Employee::class, 'user_id', 'user_id' );
  }

  public function mall() {
    return $this->belongsTo( Mall::class, 'mall_id' );
  }

  public function country() {
    return $this->belongsTo( Country::class, 'country_id' );
  }

  public function park() {
    return $this->belongsTo( Park::class, 'park_id' );
  }

  public function client() {
    return $this->belongsTo( User::class, 'client_id' );
  }

  public function staff() {
    return $this->belongsTo( User::class, 'staff_id' );
  }

  public function order_covers() {
    return $this->hasMany( OrderCover::class, 'order_id' );
  }

  // Car Model
  public function car_model() {
    return $this->belongsTo( CarModel::class, 'car_model_id' );
  }

  // Car
  public function car() {
    return $this->belongsTo( UserCar::class, 'car_id' );
  }


}

