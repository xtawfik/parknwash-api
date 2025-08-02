<?php

namespace App\Containers\AccPlace\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPlaceRepository
 */
class AccPlaceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',

    ];

}
