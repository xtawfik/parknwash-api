<?php

namespace App\Containers\Vendor\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;
use App\Containers\Country\Models\Country;
use App\Containers\City\Models\City;


class Vendor extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'phone',
		 'company_name_en',
		 'company_name_ar',
		 'status',
		 'country_id',
		 'mall_id',
		 'city_id',
		 'address_en',
		 'address_ar',
		 'email',
		 'balance',
		 'tax_number'
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
    protected $resourceKey = 'vendors';
    protected $table = 'vendor';

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


}

