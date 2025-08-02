<?php

namespace App\Containers\OrderCover\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Order\Models\Order;
use App\Containers\Cover\Models\Cover;
use App\Containers\Country\Models\Country;


class OrderCover extends Model
{
    protected $fillable = [
      #Fillables#
		'order_id',
		 'cover_id',
		 'quantity',
		 'price',
		 'total',
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
    protected $resourceKey = 'ordercovers';
    protected $table = 'order_cover';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
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

