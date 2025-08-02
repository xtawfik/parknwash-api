<?php

namespace App\Containers\AccSalesQuote\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccSalesQuoteRepository
 */
class AccSalesQuoteRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'footer_id' => '=',
'customer_id' => '=',
'date' => '=',
'expiry_date' => '=',
'valid_days' => '=',
'reference' => 'like',
'billing_address' => 'like',
'description' => 'like',
'amount' => 'like',
'title' => 'like',
'status' => '=',
'sub_total' => 'like',
'withholding_tax' => 'like',
'total' => 'like',
'cancelled' => 'like',
'show_item_image' => 'like',
'hide_total' => '=',
'withholding_tax_type' => 'like',

    ];

}
