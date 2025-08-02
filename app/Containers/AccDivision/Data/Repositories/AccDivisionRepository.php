<?php

namespace App\Containers\AccDivision\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccDivisionRepository
 */
class AccDivisionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'user_id' => '=',
'status' => '=',

    ];

}
