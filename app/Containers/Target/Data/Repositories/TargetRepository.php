<?php

namespace App\Containers\Target\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class TargetRepository
 */
class TargetRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'amount' => 'like',
'bonus' => 'like',

    ];

}
