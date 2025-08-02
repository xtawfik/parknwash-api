<?php

namespace App\Containers\BonusType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class BonusTypeRepository
 */
class BonusTypeRepository extends Repository
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
