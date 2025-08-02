<?php

namespace App\Containers\AccAccountCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccAccountCategoryRepository
 */
class AccAccountCategoryRepository extends Repository
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
