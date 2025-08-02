<?php

namespace App\Containers\Supply\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SupplyRepository
 */
class SupplyRepository extends Repository
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
