<?php

namespace App\Containers\AccCashFlowType\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCashFlow\Models\AccCashFlow;


class AccCashFlowType extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar'
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
    protected $resourceKey = 'acccashflowtypes';
    protected $table = 'acc_cash_flow_type';

    public function flows()
    {
        return $this->hasMany(AccCashFlow::class, 'cash_flow_type_id');
    }


}

