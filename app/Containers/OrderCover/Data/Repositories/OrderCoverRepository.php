<?php

namespace App\Containers\OrderCover\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OrderCoverRepository
 */
class OrderCoverRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'order_id' => '=',
'cover_id' => '=',
'quantity' => 'like',
'price' => 'like',
'total' => 'like',
'country_id' => '=',

    ];

}
