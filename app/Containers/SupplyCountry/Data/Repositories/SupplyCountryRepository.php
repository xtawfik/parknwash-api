<?php

namespace App\Containers\SupplyCountry\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SupplyCountryRepository
 */
class SupplyCountryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'supply_id' => '=',

    ];

}
