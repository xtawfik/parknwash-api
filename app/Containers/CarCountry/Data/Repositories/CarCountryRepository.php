<?php

namespace App\Containers\CarCountry\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CarModelRepository
 */
class CarCountryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'car_id' => '=',
'country_id' => '=',

    ];

}
