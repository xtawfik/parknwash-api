<?php

namespace App\Containers\AccReconciliation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccReconciliationRepository
 */
class AccReconciliationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'bank_account_id' => '=',
'statement_balance' => '=',
'status' => '=',
'discrepancy' => 'like',

    ];

}
