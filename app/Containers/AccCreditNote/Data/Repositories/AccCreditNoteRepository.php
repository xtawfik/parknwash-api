<?php

namespace App\Containers\AccCreditNote\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccCreditNoteRepository
 */
class AccCreditNoteRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'customer_id' => '=',
'sales_invoice_id' => '=',
'inventory_id' => '=',
'footer_id' => '=',
'date' => '=',
'reference' => 'like',
'description' => 'like',
'amount' => 'like',
'billing_address' => 'like',
'tax_inclusive' => 'like',
'amounts_are_tax_inclusive' => 'like',
'withholding_tax_type' => 'like',
'withholding_tax' => 'like',
'title' => 'like',

    ];

}
