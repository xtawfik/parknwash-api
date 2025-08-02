<?php

namespace App\Containers\Transaction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class TransactionRepository
 */
class TransactionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'account_id' => '=',
'type' => 'like',
'date' => '=',
'description_en' => 'like',
'description_ar' => 'like',
'debit' => 'like',
'credit' => 'like',
'balance' => 'like',

    ];

}
