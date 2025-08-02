<?php

namespace App\Containers\AccControlType\Models;

use App\Ship\Parents\Models\Model;

#use#

class AccControlType extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
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
    protected $resourceKey = 'acccontroltypes';
    protected $table = 'acc_control_type';

    #relations#
}

