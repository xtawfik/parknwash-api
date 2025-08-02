<?php

namespace App\Containers\PaymentMethod\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Country\Models\Country;


class PaymentMethod extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
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
    protected $resourceKey = 'paymentmethods';
    protected $table = 'payment_method';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }


}

