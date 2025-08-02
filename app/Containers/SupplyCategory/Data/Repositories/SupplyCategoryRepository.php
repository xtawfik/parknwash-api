<?php

namespace App\Containers\SupplyCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SupplyCategoryRepository
 */
class SupplyCategoryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',

    ];

}
