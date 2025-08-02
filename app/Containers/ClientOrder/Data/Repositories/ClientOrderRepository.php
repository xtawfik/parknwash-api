<?php

namespace App\Containers\ClientOrder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ClientOrderRepository
 */
class ClientOrderRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'country_id' => '=',
'total' => 'like',
'payment_method' => 'like',
'status' => '=',

    ];

}
