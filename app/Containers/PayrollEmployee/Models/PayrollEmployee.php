<?php

namespace App\Containers\PayrollEmployee\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Payroll\Models\Payroll;
use App\Containers\Employee\Models\Employee;


class PayrollEmployee extends Model
{
    protected $fillable = [
      #Fillables#
		'country_id',
		 'mall_id',
		 'employee_id',
		 'payroll_id',
		 'main_salary',
		 'allowances',
		 'deductions',
		 'bonus',
		 'total'
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
    protected $resourceKey = 'payrollemployees';
    protected $table = 'payroll_employee';

    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }


}

