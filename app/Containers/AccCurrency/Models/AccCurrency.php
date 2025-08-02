<?php

namespace App\Containers\AccCurrency\Models;

use App\Ship\Parents\Models\Model;

#use#

class AccCurrency extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'symbols_en',
		 'symbols_ar',
		 'type'
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
    protected $resourceKey = 'acccurrencies';
    protected $table = 'acc_currency';

    #relations#
}

