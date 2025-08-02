<?php

namespace App\Containers\AccRecurringCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccRecurringCategoryRepository
 */
class AccRecurringCategoryRepository extends Repository
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
