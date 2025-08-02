<?php

namespace App\Containers\JobCard\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class JobCardRepository
 */
class JobCardRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'employee_id' => '=',
'date' => '=',
'total' => 'like',
'orders_count' => '=',

    ];

}
