<?php

namespace App\Containers\AccExpenseClaim\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccExpenseClaimRepository
 */
class AccExpenseClaimRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'reference' => 'like',
'paid_by_id' => '=',
'capital_account_id' => '=',
'payee' => 'like',
'currency_id' => '=',
'description' => 'like',
'amount' => 'like',
'footer_id' => '=',
'paid_by_type' => '=',
'inventory_id' => '=',

    ];

}
