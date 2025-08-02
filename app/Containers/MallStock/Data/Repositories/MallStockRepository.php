<?php

namespace App\Containers\MallStock\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MallStockRepository
 */
class MallStockRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'supply_id' => '=',
'total_quantity' => 'like',
'real_quantity' => 'like',
'out_quantity' => 'like',
'damaged_qunatity' => '=',

    ];

}
