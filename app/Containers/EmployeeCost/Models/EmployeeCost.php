<?php

namespace App\Containers\EmployeeCost\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Employee\Models\Employee;


class EmployeeCost extends Model
{
  protected $fillable = [
    'employee_id',
    'employee_image',
    'employee_name',
    'employee_code',
    'employee_nationality',
    'employee_designation',
    'employee_realjob',
    'employee_civil_id',
    'employee_work_status',
    'employee_join_date',
    'EC01', 'EC02', 'EC03','EC04', 'EC05', 'EC06', 'EC07', 'EC08', 'EC09', 'EC10',
    'EC11', 'EC12', 'EC13', 'EC14', 'EC15', 'EC16', 'EC17', 'EC18',
    'EC19', 'EC20', 'EC21', 'EC22', 'EC23', 'EC24', 'EC25', 'EC26',
    'EC27', 'EC28', 'EC29', 'EC30', 'EC31', 'EC32', 'EC33', 'EC34',
    'EC35', 'EC36', 'EC37', 'EC38', 'EC39', 'EC40', 'EC41',
    'year',
    'month',
    'date',
    'company',
    'total',
    'debug',
    'mall_id',
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
  protected $resourceKey = 'employeecosts';
  protected $table = 'employee_cost';

  public function employee()
  {
    return $this->belongsTo(Employee::class, 'employee_id');
  }


}

