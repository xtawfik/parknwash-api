<?php

namespace App\Containers\BillProduct\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class BillProductRepository
 */
class BillProductRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'bill_id' => '=',
'product_id' => '=',
'amount' => 'like',
'price' => 'like',
'total' => 'like',
'country_id' => '=',
'mall_id' => '=',

    ];

}
