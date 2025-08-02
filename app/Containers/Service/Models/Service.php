<?php

namespace App\Containers\Service\Models;

use App\Containers\Car\Models\Car;
use App\Containers\Country\Models\Country;
use App\Containers\ServiceCover\Models\ServiceCover;
use App\Containers\ServiceType\Models\ServiceType;
use App\Ship\Parents\Models\Model;


class Service extends Model {
  protected $fillable = [
    #Fillables#
    'car_id',
    'country_id',
    'service_type_id',
    'price'
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
  protected $resourceKey = 'services';
  protected $table = 'service';

  public function country() {
    return $this->belongsTo( Country::class, 'country_id' );
  }

  public function car() {
    return $this->belongsTo( Car::class, 'car_id' );
  }

  public function service_type() {
    return $this->belongsTo( ServiceType::class, 'service_type_id' );
  }

  public function service_covers() {
    return $this->hasMany( ServiceCover::class, 'service_id' );
  }

}

