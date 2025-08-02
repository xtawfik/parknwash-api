<?php

namespace App\Containers\EmployeeTermination\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EmployeeTerminationRepository
 */
class EmployeeTerminationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'employee_id' => '=',
'reason_id' => '=',
'date' => '=',
'bonus' => 'like',
'notes_en' => 'like',
'notes_ar' => 'like',

    ];

}
