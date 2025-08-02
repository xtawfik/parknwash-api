<?php

namespace App\Containers\Account\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccountRepository
 */
class AccountRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'type_id' => '=',
'name_en' => 'like',
'name_ar' => 'like',
'description_en' => 'like',
'description_ar' => 'like',
'balance' => 'like',
'initial_balance' => 'like',

    ];

}
