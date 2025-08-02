<?php

namespace App\Containers\AccCapitalSubAccount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCapitalSubAccountRepository
 */
class AccCapitalSubAccountRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'user_id' => '=',
'control_account_id' => '=',
'balance_sheet_id' => '=',
'profit_loss_id' => '=',
'account_category_id' => '=',
'capital_account_id' => '=',

    ];

}
