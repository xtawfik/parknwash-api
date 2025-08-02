<?php

namespace App\Containers\AccPurchaseQuote\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccPurchaseQuoteRepository
 */
class AccPurchaseQuoteRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'footer_id' => '=',
'supplier_id' => '=',
'date' => '=',
'reference' => 'like',
'description' => 'like',
'title' => 'like',
'status' => '=',
'amount' => 'like',
'request_for_quotation' => '=',
'withholding_tax_type' => 'like',
'withholding_tax' => 'like',
'cancelled' => 'like',
'show_item_image' => 'like',
'sub_total' => 'like',
'total' => 'like',
'user_id' => '=',
'show_withholding_tax' => 'like',

    ];

}
