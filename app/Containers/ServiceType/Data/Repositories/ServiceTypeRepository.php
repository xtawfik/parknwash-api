<?php

namespace App\Containers\ServiceType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ServiceTypeRepository
 */
class ServiceTypeRepository extends Repository
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
