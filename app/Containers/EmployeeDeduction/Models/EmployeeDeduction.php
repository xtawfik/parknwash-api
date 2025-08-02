<?php

namespace App\Containers\EmployeeDeduction\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\EmployeeDeductionType\Models\EmployeeDeductionType;
use App\Containers\Employee\Models\Employee;
use App\Containers\Mall\Models\Mall;


class EmployeeDeduction extends Model
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
    protected $resourceKey = 'employeedeductions';
    protected $table = 'employee_deduction';

    public function type()
    {
        return $this->belongsTo(EmployeeDeductionType::class, 'type_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class, 'mall_id');
    }


}

