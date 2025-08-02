<?php

namespace App\Containers\Bill\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class BillRepository
 */
class BillRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'vendor_id' => '=',
'issue_date' => '=',
'due_date' => '=',
'supply_date' => '=',
'notes' => 'like',
'country_id' => '=',
'mall_id' => '=',

    ];

}
