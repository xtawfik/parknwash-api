<?php

namespace App\Containers\Request\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\Mall\Models\Mall;
use App\Containers\RequestItem\Models\RequestItem;
use App\Containers\Country\Models\Country;


class Request extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'mall_id',
		 'country_id',
		 'received_at',
		 'status'
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
    protected $resourceKey = 'requests';
    protected $table = 'request';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function request_items()
    {
        return $this->hasMany(RequestItem::class, 'request_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

