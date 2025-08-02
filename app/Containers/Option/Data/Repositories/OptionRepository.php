<?php

namespace App\Containers\Option\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OptionRepository
 */
class OptionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'option_category_id' => '=',
'name_en' => 'like',
'name_ar' => 'like',
'description_en' => 'like',
'description_ar' => 'like',

    ];

}
