<?php

namespace App\Containers\Cover\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CoverRepository
 */
class CoverRepository extends Repository
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
