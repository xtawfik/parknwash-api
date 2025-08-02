<?php

namespace App\Containers\Country\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CountryRepository
 */
class CountryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'code' => 'like',
'currency_en' => 'like',
'currency_ar' => 'like',

    ];

}
