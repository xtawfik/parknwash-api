<?php

namespace App\Containers\CoverPrice\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CoverPriceRepository
 */
class CoverPriceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'cover_id' => '=',
'service_id' => '=',
'price' => 'like',
'country_id' => '=',

    ];

}
