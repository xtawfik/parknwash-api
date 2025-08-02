<?php

namespace App\Containers\Area\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AreaRepository
 */
class AreaRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'area' => 'like',
'country_id' => '=',

    ];

}
