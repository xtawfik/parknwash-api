<?php

namespace App\Containers\Warehouse\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Country\Models\Country;
use App\Containers\Supply\Models\Supply;


class Warehouse extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'supply_id',
		 'total_quantity',
		 'out_quantity',
		 'damaged_quantity',
      'bin_location'
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
    protected $resourceKey = 'warehouses';
    protected $table = 'warehouse';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }


}

