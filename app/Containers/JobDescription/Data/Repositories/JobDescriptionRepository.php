<?php

namespace App\Containers\JobDescription\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class JobDescriptionRepository
 */
class JobDescriptionRepository extends Repository
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
