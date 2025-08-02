<?php

namespace App\Containers\AccReportingCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccReportingCategoryRepository
 */
class AccReportingCategoryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'category_id' => '=',
'name_en' => 'like',
'name_ar' => 'like',

    ];

}
