<?php

namespace App\Containers\AccBankRule\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccBankRuleRepository
 */
class AccBankRuleRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'type' => 'like',
'bank_account_id' => '=',
'amount' => 'like',
'amount_type' => 'like',
'description' => 'like',
'paid_by_type' => '=',
'other_name' => 'like',
'customer_id' => '=',
'supplier_id' => '=',

    ];

}
