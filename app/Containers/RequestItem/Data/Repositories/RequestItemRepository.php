<?php

namespace App\Containers\RequestItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class RequestItemRepository
 */
class RequestItemRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'request_id' => '=',
'supply_id' => '=',
'quantity' => 'like',

    ];

}
