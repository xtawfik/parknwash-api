<?php

namespace App\Containers\AccReportingCategoryType\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccReportingCategoryTypeRepository
 */
class AccReportingCategoryTypeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'name_en' => 'like',
'name_ar' => 'like',
'parent_id' => '=',

    ];

}
