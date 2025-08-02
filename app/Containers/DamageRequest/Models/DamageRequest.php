<?php

namespace App\Containers\DamageRequest\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Supply\Models\Supply;
use App\Containers\Mall\Models\Mall;
use App\Containers\User\Models\User;


class DamageRequest extends Model
{
    protected $fillable = [
      #Fillables#
		'mall_id',
		 'supply_id',
		 'quantity',
		 'user_id'
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
    protected $resourceKey = 'damagerequests';
    protected $table = 'damage_request';

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

