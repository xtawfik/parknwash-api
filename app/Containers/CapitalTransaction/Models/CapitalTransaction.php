<?php

namespace App\Containers\CapitalTransaction\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Country\Models\Country;
use App\Containers\Mall\Models\Mall;
use App\Containers\Partner\Models\Partner;


class CapitalTransaction extends Model
{
    protected $fillable = [
      #Fillables#
		'partner_id',
		 'amount',
		 'date',
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
    protected $resourceKey = 'capitaltransactions';
    protected $table = 'capital_transaction';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id');
    }


}

