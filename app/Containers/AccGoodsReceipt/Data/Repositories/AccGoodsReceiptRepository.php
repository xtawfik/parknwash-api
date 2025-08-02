<?php

namespace App\Containers\AccGoodsReceipt\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccGoodsReceiptRepository
 */
class AccGoodsReceiptRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'reference' => 'like',
'purchase_order_id' => '=',
'purchase_invoice_id' => '=',
'supplier_id' => '=',
'inventory_id' => '=',
'description' => 'like',
'quantity' => 'like',
'title' => 'like',
'footer_id' => '=',

    ];

}
