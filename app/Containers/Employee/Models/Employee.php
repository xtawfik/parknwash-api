<?php

namespace App\Containers\Employee\Models;

use App\Containers\Bank\Models\Bank;
use App\Containers\EmployeeExpense\Models\EmployeeExpense;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

use App\Containers\JobDescription\Models\JobDescription;
use App\Containers\Nationality\Models\Nationality;


class Employee extends Model {
  protected $fillable = [
    #Fillables#
    'country_id',
    'mall_id',
    'name_en',
    'name_ar',
    'job_description_id',
    'real_job_description_id',
    'nationality_id',
    'gender',
    'birthdate',
    'status',
    'email',
    'phone',
    'address_en',
    'address_ar',
    'employee_code',
    'join_date',
    'main_salary',
    'working_salary',
    'civil_id',
    'civil_company',
    'national_id',
    'entrance_date',
    'passport_id',
    'residence_at',
    'residence_end',
    'passport_end_date',
    'work_status',
    'cancel_reason',
    'allowance',
    'bank_id',
    'account_number',
    'beneficiary_name',
    'iban',
    'swift',
    'contract_number',

    'contract_start_date',
    'contract_end_date',
    'working_hours',

    'housing_salary',
    'transportation_salary',
    'food_salary',

    'visa_number',
    'years_of_experience',
    'employee_age',
    'arrival_date',

    'religion',
    'education',
    'qualifications',
    'specialization',
    'experiences',
    'blood_type',

    'agent',

    'user_id',

    'flat_number',
    'room_number',
    'cars',
    'uniform',
    'trolley_number',

    'bank',
    'shiuwnn',
    'knet',
    'device',
    'device_number',

    'biometric',
    'bank_account',
  ];

  protected $attributes = [

  ];

  protected $hidden = [

  ];

  protected $casts = [

  ];

  protected $appends = [
//    'expense',
  ];

  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'employees';
  protected $table = 'employee';

  public function user() {
    return $this->belongsTo( User::class, 'user_id' );
  }

  public function job_description() {
    return $this->belongsTo( JobDescription::class, 'job_description_id' );
  }

  public function real_job_description() {
    return $this->belongsTo( JobDescription::class, 'real_job_description_id' );
  }

  public function nationality() {
    return $this->belongsTo( Nationality::class, 'nationality_id' );
  }

  public function bank() {
    return $this->belongsTo( Bank::class, 'bank_id' );
  }

  public function getExpenseAttribute() {
    return EmployeeExpense::where( 'employee_id', $this->id )->sum( 'amount' );
  }


}

