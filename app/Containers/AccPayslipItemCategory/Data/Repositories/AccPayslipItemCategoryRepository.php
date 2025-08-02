<?php

namespace App\Containers\AccPayslipItemCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPayslipItemCategoryRepository
 */
class AccPayslipItemCategoryRepository extends Repository
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
