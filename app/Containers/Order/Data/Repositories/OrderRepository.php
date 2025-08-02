<?php

namespace App\Containers\Order\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OrderRepository
 */
class OrderRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'country_id' => '=',
'mall_id' => '=',
'user_id' => '=',
'service_id' => '=',
'car_number' => 'like',
'payment_method' => 'like',
'discount_percent' => '=',
'total' => 'like',
'status' => '=',
'park_id' => '=',
'client_name' => 'like',
'client_phone' => 'like',
'is_client' => 'like',

    ];

}
