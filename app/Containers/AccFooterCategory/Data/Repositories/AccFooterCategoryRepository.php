<?php

namespace App\Containers\AccFooterCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccFooterCategoryRepository
 */
class AccFooterCategoryRepository extends Repository
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
