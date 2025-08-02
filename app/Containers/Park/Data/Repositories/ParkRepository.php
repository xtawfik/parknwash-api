<?php

namespace App\Containers\Park\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ParkRepository
 */
class ParkRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'mall_id' => '=',
'park' => 'like',

    ];

}
