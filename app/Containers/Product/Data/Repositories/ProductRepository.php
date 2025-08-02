<?php

namespace App\Containers\Product\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ProductRepository
 */
class ProductRepository extends Repository {

  /**
   * @var array
   */
  protected $fieldSearchable = [
    'id'          => '=',
    'name_en'     => 'like',
    'name_ar'     => 'like',
    'serial'      => 'like',
    'category_id' => '=',
    'barcode'     => 'like',
    'amount'      => 'like',
    'buy_price'   => 'like',
    'sale_price'  => 'like',
    'sellable'    => 'like',
    'country_id'  => '=',
    'mall_id'     => '=',

  ];

}
