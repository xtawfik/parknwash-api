<?php

namespace App\Containers\FixedAssets\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class FixedAssetsRepository
 */
class FixedAssetsRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'date' => '=',
'price' => 'like',
'description_en' => 'like',
'description_ar' => 'like',
'category_id' => '=',
'country_id' => '=',
'mall_id' => '=',

    ];

}
