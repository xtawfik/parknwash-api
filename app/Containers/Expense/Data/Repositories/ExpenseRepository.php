<?php

namespace App\Containers\Expense\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ExpenseRepository
 */
class ExpenseRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'mall_id' => '=',
'user_id' => '=',
'amount' => 'like',
'date' => '=',
'type' => 'like',
'group' => 'like',
'from' => 'like',
'description' => 'like',

    ];

}
