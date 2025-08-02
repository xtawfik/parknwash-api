<?php

namespace App\Containers\AccPlace\Models;

use App\Ship\Parents\Models\Model;

#use#

class AccPlace extends Model
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
    protected $resourceKey = 'accplaces';
    protected $table = 'acc_place';

    #relations#
}

