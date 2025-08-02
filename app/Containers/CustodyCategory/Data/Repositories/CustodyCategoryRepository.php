<?php

namespace App\Containers\CustodyCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CustodyCategoryRepository
 */
class CustodyCategoryRepository extends Repository
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
