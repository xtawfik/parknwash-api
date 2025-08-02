<?php

namespace App\Containers\AccCurrencyExchangeTransaction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCurrencyExchangeTransactionRepository
 */
class AccCurrencyExchangeTransactionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'base_amount' => 'like',
'exchange_amount' => 'like',
'currency_exchange_id' => '=',
'user_id' => '=',

    ];

}
