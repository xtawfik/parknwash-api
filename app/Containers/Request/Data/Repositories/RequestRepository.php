<?php

namespace App\Containers\Request\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class RequestRepository
 */
class RequestRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'mall_id' => '=',
'country_id' => '=',
'received_at' => '=',
'status' => '=',

    ];

}
