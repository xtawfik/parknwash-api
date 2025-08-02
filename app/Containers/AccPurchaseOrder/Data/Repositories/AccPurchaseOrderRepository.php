<?php

namespace App\Containers\AccPurchaseOrder\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPurchaseOrderRepository
 */
class AccPurchaseOrderRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'footer_id' => '=',
'supplier_id' => '=',
'cancelled' => 'like',
'purchase_quote_id' => '=',
'date' => '=',
'reference' => 'like',
'description' => 'like',
'quantity_receive' => 'like',
'amount' => 'like',
'title' => 'like',
'status' => '=',
'sub_total' => 'like',
'total' => 'like',
'withholding_tax_type' => 'like',
'withholding_tax' => 'like',
'show_item_image' => 'like',
'delivery_status' => '=',
'invoice_amount' => 'like',
'invoice_status' => '=',
'show_withholding_tax' => 'like',

    ];

}
