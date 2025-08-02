<?php

namespace App\Containers\CoverPrice\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Service\Models\Service;
use App\Containers\Cover\Models\Cover;
use App\Containers\Country\Models\Country;


class CoverPrice extends Model
{
    protected $fillable = [
      #Fillables#
		'cover_id',
		 'service_id',
		 'price',
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
    protected $resourceKey = 'coverprices';
    protected $table = 'cover_price';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function cover()
    {
        return $this->belongsTo(Cover::class, 'cover_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

