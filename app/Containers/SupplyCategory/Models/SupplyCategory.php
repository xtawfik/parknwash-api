<?php

namespace App\Containers\SupplyCategory\Models;

use App\Ship\Parents\Models\Model;

#use#

class SupplyCategory extends Model
{
    protected $fillable = [
      #Fillables#
		'name'
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
    protected $resourceKey = 'supplycategories';
    protected $table = 'supply_category';

    #relations#
}

