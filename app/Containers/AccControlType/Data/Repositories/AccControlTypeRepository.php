<?php

namespace App\Containers\AccControlType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccControlTypeRepository
 */
class AccControlTypeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'user_id' => '=',

    ];

}
