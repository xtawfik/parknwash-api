<?php

namespace App\Containers\ServiceCover\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ServiceCoverRepository
 */
class ServiceCoverRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'service_id' => '=',
'cover_id' => '=',
'quantity' => 'like',

    ];

}
