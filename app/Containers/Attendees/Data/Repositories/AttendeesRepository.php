<?php

namespace App\Containers\Attendees\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AttendeesRepository
 */
class AttendeesRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'employee_id' => '=',
'date' => '=',
'type' => 'like',

    ];

}
