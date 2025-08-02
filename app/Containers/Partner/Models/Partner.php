<?php

namespace App\Containers\Partner\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;
use App\Containers\Country\Models\Country;


class Partner extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'phone',
		 'percent',
		 'total',
		 'country_id',
		 'mall_id'
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
    protected $resourceKey = 'partners';
    protected $table = 'partner';

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

