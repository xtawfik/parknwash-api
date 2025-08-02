<?php

namespace App\Containers\EmployeeDeductionType\Models;

use App\Ship\Parents\Models\Model;

#use#

class EmployeeDeductionType extends Model
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
    protected $resourceKey = 'employeedeductiontypes';
    protected $table = 'employee_deduction_type';

    #relations#
}

