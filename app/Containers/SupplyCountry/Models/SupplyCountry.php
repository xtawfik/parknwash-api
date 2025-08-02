<?php

namespace App\Containers\SupplyCountry\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Country\Models\Country;
use App\Containers\Supply\Models\Supply;


class SupplyCountry extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'supply_id'
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
    protected $resourceKey = 'supplycountries';
    protected $table = 'supply_country';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }


}

