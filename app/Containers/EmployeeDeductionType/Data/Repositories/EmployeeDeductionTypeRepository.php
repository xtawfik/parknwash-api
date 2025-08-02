<?php

namespace App\Containers\EmployeeDeductionType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EmployeeDeductionTypeRepository
 */
class EmployeeDeductionTypeRepository extends Repository
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
