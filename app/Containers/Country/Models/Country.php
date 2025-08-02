<?php

namespace App\Containers\Country\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;


class Country extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'code',
		 'currency_en',
		 'currency_ar'
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
    protected $resourceKey = 'countries';
    protected $table = 'country';

    public function malls()
    {
        return $this->hasMany(Mall::class, 'country_id');
    }


}

