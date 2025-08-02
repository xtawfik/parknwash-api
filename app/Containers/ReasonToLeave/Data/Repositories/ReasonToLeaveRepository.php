<?php

namespace App\Containers\ReasonToLeave\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ReasonToLeaveRepository
 */
class ReasonToLeaveRepository extends Repository
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
