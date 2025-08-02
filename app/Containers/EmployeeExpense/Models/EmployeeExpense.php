<?php

namespace App\Containers\EmployeeExpense\Models;

use App\Ship\Parents\Models\Model;

#use#

class EmployeeExpense extends Model
{
  protected $fillable = [
    #Fillables#
    'name_en',
    'name_ar',
    'date',
    'amount',
    'employee_id',
    'company'
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
  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'employeeexpenses';
  protected $table = 'employee_expense';

  #relations#
}

