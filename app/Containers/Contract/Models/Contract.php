<?php

namespace App\Containers\Contract\Models;

use App\Ship\Parents\Models\Model;

#use#

class Contract extends Model
{
    protected $fillable = [
      #Fillables#
		'contract_number',
		 'contract_name',
		 'contract_type',
		 'status',
		 'contract_start',
		 'contract_end',
		 'contract_period',
		 'contract_owner',
		 'contract_value',
		 'email',
		 'contact_number',
		 'file'
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
    protected $resourceKey = 'contracts';
    protected $table = 'contract';

    #relations#
}

