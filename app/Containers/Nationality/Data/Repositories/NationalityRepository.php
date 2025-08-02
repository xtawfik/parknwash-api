<?php

namespace App\Containers\Nationality\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class NationalityRepository
 */
class NationalityRepository extends Repository
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
