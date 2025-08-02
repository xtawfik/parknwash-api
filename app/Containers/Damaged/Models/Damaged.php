<?php

namespace App\Containers\Damaged\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\Country\Models\Country;
use App\Containers\Mall\Models\Mall;
use App\Containers\Supply\Models\Supply;


class Damaged extends Model
{
    protected $fillable = [
      #Fillables#
		'user_id',
		 'country_id',
		 'mall_id',
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
    protected $resourceKey = 'damageds';
    protected $table = 'damaged';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }


}

