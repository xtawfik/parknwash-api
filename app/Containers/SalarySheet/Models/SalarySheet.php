<?php

namespace App\Containers\SalarySheet\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Employee\Models\Employee;
use App\Containers\Mall\Models\Mall;
use Illuminate\Database\Eloquent\SoftDeletes;


class SalarySheet extends Model
{

  use SoftDeletes;

  protected $fillable = [
    #Fillables#
    'employee_id',
    'employee_name',
    'employee_code',
    'employee_nationality',
    'employee_designation',
    'employee_realjob',
    'employee_civil_id',
    'employee_work_status',
    'employee_cancel_reason',
    'employee_image',
    'employee_join_date',
    'monthly_days',
    'working_days',
    'total_sales',
    'per_day',
    'basic_salary',
    'commission',
    'previous_due',
    'tips',
    'incentive',
    'housing',
    'transport',
    'medical',
    'bonus',
    'mobile',
    'food',
    'travelling',
    'gross_salary',
    'ticket_d',
    'housing_d',
    'transport_d',
    'mobile_d',
    'loan',
    'absent',
    'advance',
    'sick_leave',
    'penalty',
    'total_deductions',
    'net_salary',
    'paid_salary',
    'relay',
    'paid_way',
    'paid_date',
    'branch',
    'month',
    'year',
    'mall_id',
    'mall_name'
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
  protected $resourceKey = 'salarysheets';
  protected $table = 'salary_sheet';

  public function employee()
  {
    return $this->belongsTo(Employee::class, 'employee_id');
  }

  public function mall()
  {
    return $this->belongsTo(Mall::class, 'mall_id');
  }


}

