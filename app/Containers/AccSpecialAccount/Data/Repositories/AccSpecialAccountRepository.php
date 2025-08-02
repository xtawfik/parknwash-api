<?php

namespace App\Containers\AccSpecialAccount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccSpecialAccountRepository
 */
class AccSpecialAccountRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'code' => 'like',
'currency_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'user_id' => '=',
'balance_sheet_id' => '=',
'control_account_id' => '=',
'starting_balance' => 'like',
'balance_type' => 'like',
'status' => '=',
'balance' => 'like',
'account_category_id' => '=',

    ];

}
