<?php

namespace App\Containers\AccDebitNote\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccDebitNoteRepository
 */
class AccDebitNoteRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'date' => '=',
'reference' => 'like',
'supplier_id' => '=',
'purchase_invoice_id' => '=',
'description' => 'like',
'amount' => 'like',
'tax_inclusive' => 'like',
'total' => 'like',
'footer_id' => '=',
'sub_total' => 'like',

    ];

}
