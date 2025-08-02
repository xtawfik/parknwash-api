<?php

namespace App\Containers\AccCurrency\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCurrencyRepository
 */
class AccCurrencyRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'symbols_en' => 'like',
'symbols_ar' => 'like',
'type' => 'like',

    ];

}
