<?php

namespace App\Containers\CapitalTransaction\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CapitalTransactionRepository
 */
class CapitalTransactionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'partner_id' => '=',
'amount' => 'like',
'date' => '=',
'notes' => 'like',
'country_id' => '=',
'mall_id' => '=',

    ];

}
