<?php

namespace App\Containers\AccLockDate\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccLockDateRepository
 */
class AccLockDateRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'lock_accounting_period' => '=',
'date' => '=',

    ];

}
