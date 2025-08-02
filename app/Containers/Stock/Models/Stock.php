<?php

namespace App\Containers\Stock\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Supply\Models\Supply;
use App\Containers\User\Models\User;
use App\Containers\Country\Models\Country;


class Stock extends Model
{
    protected $fillable = [
      #Fillables#
		'supply_id',
		 'quantity',
		 'damaged',
		 'user_id',
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
    protected $resourceKey = 'stocks';
    protected $table = 'stock';

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

