<?php

namespace App\Containers\AccCapitalAccount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCapitalAccountRepository
 */
class AccCapitalAccountRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'code' => 'like',
'control_account_id' => '=',
'division_id' => '=',
'division_place_id' => '=',
'place_id' => '=',
'starting_balance_type' => 'like',
'starting_balance_amount' => 'like',
'status' => '=',
'user_id' => '=',
'balance_sheet_id' => '=',
'balance' => 'like',
'account_category_id' => '=',

    ];

}
