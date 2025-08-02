<?php

namespace App\Containers\AllowanceType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AllowanceTypeRepository
 */
class AllowanceTypeRepository extends Repository
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
