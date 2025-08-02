<?php

namespace App\Containers\AccCurrencyCurrency\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCurrencyCurrencyRepository
 */
class AccCurrencyCurrencyRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'currency_id' => '=',
'currency_revaluation_id' => '=',
'realized_gain' => 'like',
'user_id' => '=',

    ];

}
