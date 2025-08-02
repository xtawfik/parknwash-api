<?php

namespace App\Containers\Bill\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Vendor\Models\Vendor;
use App\Containers\Mall\Models\Mall;
use App\Containers\Country\Models\Country;


class Bill extends Model
{
    protected $fillable = [
      #Fillables#
		'vendor_id',
		 'issue_date',
		 'due_date',
		 'supply_date',
		 'notes',
		 'country_id',
		 'mall_id'
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
    protected $resourceKey = 'bills';
    protected $table = 'bill';

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
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

