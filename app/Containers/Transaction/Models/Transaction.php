<?php

namespace App\Containers\Transaction\Models;

use App\Containers\Account\Models\Account;
use App\Ship\Parents\Models\Model;


class Transaction extends Model {
  protected $fillable = [
    #Fillables#
    'country_id',
    'mall_id',
    'account_id',
    'type',
    'date',
    'description_en',
    'description_ar',
    'debit',
    'credit',
    'balance'
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
  protected $resourceKey = 'transactions';
  protected $table = 'transaction';

  public function account() {
    return $this->belongsTo( Account::class, 'account_id' );
  }


}

