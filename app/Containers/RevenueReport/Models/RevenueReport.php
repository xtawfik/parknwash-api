<?php

namespace App\Containers\RevenueReport\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;
use App\Containers\Country\Models\Country;


class RevenueReport extends Model
{
    protected $fillable = [
      #Fillables#
		'date',
		 'country_id',
		 'mall_id',
		 'jeep',
		 'vip',
		 'vvip',
		 'sedan',
		 'subscription',
		 'total_wash',
		 'total_money',
		 'expenses',
		 'net_sale',
		 'p_seat',
		 'p_gear',
		 'p_steering',
		 'p_mat',
		 'bag',
		 'seat',
		 'gear',
		 'steering'
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
    protected $resourceKey = 'revenuereports';
    protected $table = 'revenue_report';

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

