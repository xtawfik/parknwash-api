<?php

namespace App\Containers\AccCashFlow\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AccCashFlowType\Models\AccCashFlowType;


class AccCashFlow extends Model
{
    protected $fillable = [
      #Fillables#
		'cash_flow_type_id',
		 'name'
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
    protected $resourceKey = 'acccashflows';
    protected $table = 'acc_cash_flow';

    public function cash_flow_type()
    {
        return $this->belongsTo(AccCashFlowType::class, 'cash_flow_type_id');
    }


}

