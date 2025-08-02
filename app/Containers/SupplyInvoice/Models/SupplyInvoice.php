<?php

namespace App\Containers\SupplyInvoice\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\User\Models\User;
use App\Containers\Country\Models\Country;
use App\Containers\Supply\Models\Supply;


class SupplyInvoice extends Model {
  protected $fillable = [
    #Fillables#
    'user_id',
    'country_id',
    'supply_id',
    'quantity',
    'price',
    'total',
    'description_en',
    'description_ar',
    'bill_no',
    'created_at',
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
  protected $resourceKey = 'supplyinvoices';
  protected $table = 'supply_invoice';

  public function user() {
    return $this->belongsTo( User::class, 'user_id' );
  }

  public function country() {
    return $this->belongsTo( Country::class, 'country_id' );
  }

  public function supply() {
    return $this->belongsTo( Supply::class, 'supply_id' );
  }


}

