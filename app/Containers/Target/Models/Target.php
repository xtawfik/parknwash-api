<?php

namespace App\Containers\Target\Models;

use App\Ship\Parents\Models\Model;

#use#

class Target extends Model
{
    protected $fillable = [
      #Fillables#
		'amount',
		 'bonus'
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
    protected $resourceKey = 'targets';
    protected $table = 'target';

    #relations#
}

