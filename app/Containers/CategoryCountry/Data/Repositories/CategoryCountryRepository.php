<?php

namespace App\Containers\CategoryCountry\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CategoryCountryRepository
 */
class CategoryCountryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'category_id' => '=',

    ];

}
