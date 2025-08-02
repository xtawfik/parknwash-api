<?php

namespace App\Containers\Supply\Models;

use App\Containers\Country\Models\Country;
use App\Containers\Nationality\Models\Nationality;
use App\Containers\SupplyCategory\Models\SupplyCategory;
use App\Containers\SupplyInvoice\Models\SupplyInvoice;
use App\Ship\Parents\Models\Model;


class Supply extends Model {
  protected $fillable = [
    #Fillables#
    'name_en',
    'name_ar',
    'quantity',
    'damaged',
    'barcode',
    'description_en',
    'description_ar',
    'made_in',
    'sorter',
    'category_id',
    'bin_location',
    'unit',
  ];

  protected $attributes = [

  ];

  protected $hidden = [

  ];

  protected $casts = [

  ];

  protected $appends = [
    'stock',
    'stocks',
    'all_quantity',
  ];

  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'supplies';
  protected $table = 'supply';

  public function getStockAttribute() {
    return 1;
  }

  public function getStocksAttribute() {
    return 10;
  }

  public function getAllQuantityAttribute() {
    $quantity = SupplyInvoice::where( 'supply_id', $this->id )->sum( 'quantity' );

    return $quantity;
  }

  public function countries() {
    return $this->belongsToMany( Country::class, 'supply_country', 'supply_id', 'country_id' );
  }

  // Made in
  public function madeIn() {
    return $this->belongsTo( Nationality::class, 'made_in', 'id' );
  }

  // Category
  public function category() {
    return $this->belongsTo( SupplyCategory::class, 'category_id', 'id' );
  }


}

