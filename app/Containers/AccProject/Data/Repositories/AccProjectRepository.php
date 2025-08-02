<?php

namespace App\Containers\AccProject\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccProjectRepository
 */
class AccProjectRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'income' => 'like',
'direct_cost' => 'like',
'profit' => 'like',
'status' => '=',
'user_id' => '=',
'code' => 'like',

    ];

}
