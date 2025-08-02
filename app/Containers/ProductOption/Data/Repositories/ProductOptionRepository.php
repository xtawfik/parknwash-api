<?php

namespace App\Containers\ProductOption\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ProductOptionRepository
 */
class ProductOptionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'product_id' => '=',
'country_id' => '=',
'option_category_id' => '=',
'option_id' => '=',
'price' => 'like',

    ];

}
