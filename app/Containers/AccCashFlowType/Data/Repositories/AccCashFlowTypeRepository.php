<?php

namespace App\Containers\AccCashFlowType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCashFlowTypeRepository
 */
class AccCashFlowTypeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',

    ];

}
