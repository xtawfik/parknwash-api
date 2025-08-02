<?php

namespace App\Containers\AccBalanceSheet\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccBalanceSheetRepository
 */
class AccBalanceSheetRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'parent_id' => '=',
'user_id' => '=',

    ];

}
