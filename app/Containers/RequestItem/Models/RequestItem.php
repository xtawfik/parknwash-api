<?php

namespace App\Containers\RequestItem\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Request\Models\Request;
use App\Containers\Supply\Models\Supply;


class RequestItem extends Model
{
    protected $fillable = [
      #Fillables#
		'request_id',
		 'supply_id',
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
    protected $resourceKey = 'requestitems';
    protected $table = 'request_item';

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }


}

