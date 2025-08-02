<?php

namespace App\Containers\Service\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ServiceRepository
 */
class ServiceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'car_id' => '=',
'country_id' => '=',
'service_type_id' => '=',
'price' => 'like',

    ];

}
