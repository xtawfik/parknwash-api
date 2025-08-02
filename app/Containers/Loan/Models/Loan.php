<?php

namespace App\Containers\Loan\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Mall\Models\Mall;
use App\Containers\Employee\Models\Employee;
use App\Containers\LoanType\Models\LoanType;
use App\Containers\Account\Models\Account;


class Loan extends Model {
  protected $fillable = [
    #Fillables#
    'country_id',
    'mall_id',
    'account_id',
    'date',
    'status',
    'notes',
    'notes_ar',
    'amount',
    'employee_id',
    'type_id',
    'paid',
  ];

  protected $attributes = [

  ];

  protected $hidden = [

  ];

  protected $casts = [

  ];

  protected $appends = [
    'remain'
  ];

  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  /**
   * A resource key to be used by the JSON API Serializer responses.
   */
  protected $resourceKey = 'loans';
  protected $table = 'loan';

  public function mall() {
    return $this->belongsTo( Mall::class, 'mall_id' );
  }

  public function employee() {
    return $this->belongsTo( Employee::class, 'employee_id' );
  }

  public function type() {
    return $this->belongsTo( LoanType::class, 'type_id' );
  }

  public function account() {
    return $this->belongsTo( Account::class, 'account_id' );
  }

  public function getRemainAttribute() {
    return $this->amount - $this->paid;
  }

}

