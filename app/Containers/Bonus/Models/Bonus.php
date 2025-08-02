<?php

namespace App\Containers\Bonus\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Country\Models\Country;
use App\Containers\Mall\Models\Mall;
use App\Containers\Employee\Models\Employee;
use App\Containers\BonusType\Models\BonusType;
use App\Containers\Account\Models\Account;


class Bonus extends Model {
  protected $fillable = [
    #Fillables#
    'country_id',
    'mall_id',
    'employee_id',
    'account_id',
    'type_id',
    'amount',
    'date',
    'status',
    'notes',
    'notes_ar'
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
  protected $resourceKey = 'bonuses';
  protected $table = 'bonus';

  public function country() {
    return $this->belongsTo( Country::class, 'country_id' );
  }

  public function mall() {
    return $this->belongsTo( Mall::class, 'mall_id' );
  }

  public function employee() {
    return $this->belongsTo( Employee::class, 'employee_id' );
  }

  public function type() {
    return $this->belongsTo( BonusType::class, 'type_id' );
  }

  public function account() {
    return $this->belongsTo( Account::class, 'account_id' );
  }


}

