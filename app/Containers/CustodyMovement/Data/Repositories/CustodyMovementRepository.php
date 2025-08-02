<?php

namespace App\Containers\CustodyMovement\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CustodyMovementRepository
 */
class CustodyMovementRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'custody_id' => '=',
'date' => '=',
'movement' => 'like',

    ];

}
