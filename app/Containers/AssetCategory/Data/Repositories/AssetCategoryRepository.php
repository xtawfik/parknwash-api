<?php

namespace App\Containers\AssetCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AssetCategoryRepository
 */
class AssetCategoryRepository extends Repository
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
