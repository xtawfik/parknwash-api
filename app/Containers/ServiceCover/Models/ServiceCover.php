<?php

namespace App\Containers\ServiceCover\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Service\Models\Service;
use App\Containers\Cover\Models\Cover;


class ServiceCover extends Model
{
    protected $fillable = [
      #Fillables#
		'service_id',
		 'cover_id',
		 'quantity'
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
    protected $resourceKey = 'servicecovers';
    protected $table = 'service_cover';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function cover()
    {
        return $this->belongsTo(Cover::class, 'cover_id');
    }


}

