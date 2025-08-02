<?php

namespace App\Containers\Allowance\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\AllowanceType\Models\AllowanceType;
use App\Containers\Employee\Models\Employee;
use App\Containers\Mall\Models\Mall;
use App\Containers\Country\Models\Country;


class Allowance extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'mall_id',
		 'type_id',
		 'employee_id',
		 'amount',
		 'calculation_method'
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
    protected $resourceKey = 'allowances';
    protected $table = 'allowance';

    public function type()
    {
        return $this->belongsTo(AllowanceType::class, 'type_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
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

