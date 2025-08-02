<?php

namespace App\Containers\AccProfitLoss\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccProfitLossRepository
 */
class AccProfitLossRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'group_type' => 'like',
'parent_id' => '=',
'user_id' => '=',

    ];

}
