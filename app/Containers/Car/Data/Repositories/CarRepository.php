<?php

namespace App\Containers\Car\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CarRepository
 */
class CarRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',

    ];

}
