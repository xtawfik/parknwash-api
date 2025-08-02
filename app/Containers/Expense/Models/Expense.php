<?php

namespace App\Containers\Expense\Models;

use App\Containers\Mall\Models\Mall;
use App\Ship\Parents\Models\Model;

#use#

class Expense extends Model {
  protected $fillable = [
    #Fillables#
    'mall_id',
    'user_id',
    'amount',
    'date',
    'type',
    'group',
    'from',
    'description',
    'description_ar',
    'bill_number',
    'serial_number'
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
  protected $resourceKey = 'expenses';
  protected $table = 'expense';

  #relations#
  public function mall() {
    return $this->belongsTo( Mall::class, 'mall_id' );
  }
}

