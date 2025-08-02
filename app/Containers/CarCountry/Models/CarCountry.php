<?php

namespace App\Containers\CarCountry\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Car\Models\Car;
use App\Containers\Country\Models\Country;


class CarCountry extends Model
{
    protected $fillable = [
      #Fillables#
		'car_id',
		 'country_id'
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
    protected $resourceKey = 'carcountries';
    protected $table = 'car_country';

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

