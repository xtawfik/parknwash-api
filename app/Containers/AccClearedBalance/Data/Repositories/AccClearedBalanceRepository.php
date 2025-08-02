<?php

namespace App\Containers\AccClearedBalance\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccClearedBalanceRepository
 */
class AccClearedBalanceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'transaction_id' => '=',
'bank_account_id' => '=',
'balance' => 'like',

    ];

}
