<?php

namespace App\Containers\AccExpenseClaimPayers\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccExpenseClaimPayersRepository
 */
class AccExpenseClaimPayersRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'balance_type' => 'like',
'starting_balance' => 'like',
'division_id' => '=',
'user_id' => '=',
'status' => '=',
'place_id' => '=',
'division_place_id' => '=',

    ];

}
