<?php

namespace App\Containers\AccDeliveryNote\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccDeliveryNoteRepository
 */
class AccDeliveryNoteRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'reference' => 'like',
'sales_order_id' => '=',
'sales_invoice_id' => '=',
'customer_id' => '=',
'inventory_id' => '=',
'user_id' => '=',
'description' => 'like',
'quantity' => 'like',
'delivery_address' => 'like',
'title' => 'like',
'footer_id' => '=',

    ];

}
