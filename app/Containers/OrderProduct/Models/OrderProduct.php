<?php

namespace App\Containers\OrderProduct\Models;

use App\Containers\ClientOrder\Models\ClientOrder;
use App\Containers\Option\Models\Option;
use App\Containers\OrderOption\Models\OrderOption;
use App\Containers\Product\Models\Product;
use App\Ship\Parents\Models\Model;


class OrderProduct extends Model {
  protected $fillable = [
    #Fillables#
    'order_id',
    'product_id',
    'option_id',
    'quantity',
    'price'
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
  protected $resourceKey = 'orderproducts';
  protected $table = 'order_product';

  public function order() {
    return $this->belongsTo( ClientOrder::class, 'order_id' );
  }

  public function product() {
    return $this->belongsTo( Product::class, 'product_id' );
  }

  public function option() {
    return $this->belongsTo( Option::class, 'option_id' );
  }

  public function order_options() {
    return $this->hasMany( OrderOption::class, 'order_product_id' );
  }


}

