<?php

namespace App\Containers\AccCurrencyExchange\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCurrencyExchangeRepository
 */
class AccCurrencyExchangeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'currency_id' => '=',
'rate' => '=',
'transaction' => 'like',
'user_id' => '=',

    ];

}
