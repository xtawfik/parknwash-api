<?php

namespace App\Containers\AccDivisionPlace\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccDivisionPlaceRepository
 */
class AccDivisionPlaceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'place_id' => '=',
'division_id' => '=',
'name' => 'like',
'status' => '=',

    ];

}
