<?php

namespace App\Containers\Receipt\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ReceiptRepository
 */
class ReceiptRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'country_id' => '=',
'mall_id' => '=',
'employee_id' => '=',
'account_id' => '=',
'type' => 'like',
'date' => '=',
'amount' => 'like',
'allocate' => '=',
'allocate_id' => '=',

    ];

}
