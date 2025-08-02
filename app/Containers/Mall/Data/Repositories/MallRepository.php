<?php

namespace App\Containers\Mall\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MallRepository
 */
class MallRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'country_id' => '=',
'name_en' => 'like',
'name_ar' => 'like',
'area_id' => '=',

    ];

}
