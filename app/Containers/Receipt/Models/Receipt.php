<?php

namespace App\Containers\Receipt\Models;

use App\Containers\Account\Models\Account;
use App\Containers\Employee\Models\Employee;
use App\Ship\Parents\Models\Model;


class Receipt extends Model {
  protected $fillable = [
    #Fillables#
    'country_id',
    'mall_id',
    'employee_id',
    'account_id',
    'type',
    'date',
    'amount',
    'allocate',
    'allocate_id',
    'notes',
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
  protected $resourceKey = 'receipts';
  protected $table = 'receipt';

  public function account() {
    return $this->belongsTo( Account::class, 'account_id' );
  }

  public function employee() {
    return $this->belongsTo( Employee::class, 'employee_id' );
  }


}

