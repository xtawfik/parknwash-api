<?php

namespace App\Containers\Product\Models;

use App\Containers\Category\Models\Category;
use App\Containers\Country\Models\Country;
use App\Containers\Option\Models\Option;
use App\Containers\OptionCategory\Models\OptionCategory;
use App\Containers\ProductOption\Models\ProductOption;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model {

  use softDeletes;

  protected $fillable = [
    #Fillables#
    'name_en',
    'name_ar',
    'serial',
    'category_id',
    'barcode',
    'amount',
    'buy_price',
    'sale_price',
    'sellable',
    'country_id',
    'mall_id',
    'price',
  ];

  protected $attributes = [

  ];

  protected $hidden = [

  ];

  protected $casts = [

  ];

  protected $appends = [
    'options'
  ];

  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'products';
  protected $table = 'product';

  public function country() {
    return $this->belongsTo( Country::class, 'country_id' );
  }

  public function category() {
    return $this->belongsTo( Category::class, 'category_id' );
  }

  public function getOptionsAttribute() {
    $options        = $categories = [];
    $productOptions = ProductOption::where( 'product_id', $this->id )->get();
    foreach ( $productOptions as $option ) {
      $optionObject        = Option::find( $option->option_id, [
        'name_ar',
        'name_en',
        'description_en',
        'description_ar',
        'id'
      ] );
      $optionObject->price = $option->price;

      $category                                  = OptionCategory::find( $option->option_category_id, [
        'id',
        'name_ar',
        'name_en',
        'type'
      ] );
      $categories[ $option->option_category_id ] = $category;
      $options[ $option->option_category_id ][]  = $optionObject;
    }

    return [
      "options"    => $options,
      "categories" => $categories
    ];
  }


}

