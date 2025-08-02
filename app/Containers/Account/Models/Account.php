<?php

namespace App\Containers\Account\Models;

use App\Containers\AccountType\Models\AccountType;
use App\Containers\Country\Models\Country;
use App\Containers\Mall\Models\Mall;
use App\Containers\Transaction\Models\Transaction;
use App\Ship\Parents\Models\Model;


class Account extends Model {
  protected $fillable = [
    #Fillables#
    'country_id',
    'mall_id',
    'type_id',
    'name_en',
    'name_ar',
    'description_en',
    'description_ar',
    'balance',
    'initial_balance'
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
  protected $resourceKey = 'accounts';
  protected $table = 'account';

  public function country() {
    return $this->belongsTo( Country::class, 'country_id' );
  }

  public function mall() {
    return $this->belongsTo( Mall::class, 'mall_id' );
  }

  public function type() {
    return $this->belongsTo( AccountType::class, 'type_id' );
  }

  public function transactions() {
    return $this->hasMany( Transaction::class, 'account_id' );
  }


}

