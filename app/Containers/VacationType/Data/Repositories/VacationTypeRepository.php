<?php

namespace App\Containers\VacationType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class VacationTypeRepository
 */
class VacationTypeRepository extends Repository
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
