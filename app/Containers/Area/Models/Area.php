<?php

namespace App\Containers\Area\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;
use App\Containers\Country\Models\Country;


class Area extends Model
{
    protected $fillable = [
      #Fillables#
		'area',
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
    protected $resourceKey = 'areas';
    protected $table = 'area';

    public function malls()
    {
        return $this->hasMany(Mall::class, 'area_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

