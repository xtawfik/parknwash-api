<?php

namespace App\Containers\SupplyInvoice\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SupplyInvoiceRepository
 */
class SupplyInvoiceRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'country_id' => '=',
'supply_id' => '=',
'quantity' => 'like',
'price' => 'like',
'total' => 'like',
'description_en' => 'like',
'description_ar' => 'like',
'bill_no' => 'like',

    ];

}
