<?php

namespace App\Containers\HandOver\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\Mall\Models\Mall;
use App\Containers\Country\Models\Country;


class HandOver extends Model
{
    protected $fillable = [
      #Fillables#
		'employee_id',
		 'supervisor_id',
		 'amount',
		 'status',
		 'mall_id',
		 'country_id',
		 'confirmed_at'
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
    protected $resourceKey = 'handovers';
    protected $table = 'hand_over';

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

