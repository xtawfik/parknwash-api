<?php

namespace App\Containers\DeductionType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class DeductionTypeRepository
 */
class DeductionTypeRepository extends Repository
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
