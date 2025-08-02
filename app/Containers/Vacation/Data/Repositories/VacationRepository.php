<?php

namespace App\Containers\Vacation\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class VacationRepository
 */
class VacationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'employee_id' => '=',
'type_id' => '=',
'start_at' => '=',
'end_at' => '=',
'status' => '=',
'application_date' => '=',
'amount' => 'like',

    ];

}
