<?php

namespace App\Containers\AccCashFlow\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCashFlowRepository
 */
class AccCashFlowRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'cash_flow_type_id' => '=',
'name' => 'like',

    ];

}
