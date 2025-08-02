<?php

namespace App\Containers\OptionCategory\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OptionCategoryRepository
 */
class OptionCategoryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'description_en' => 'like',
'description_ar' => 'like',

    ];

}
