<?php

namespace App\Containers\AccWithholdingTaxReceipt\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccWithholdingTaxReceiptRepository
 */
class AccWithholdingTaxReceiptRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'user_id' => '=',
'customer_id' => '=',
'description' => 'like',
'amount' => 'like',

    ];

}
