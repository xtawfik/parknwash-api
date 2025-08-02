<?php

namespace App\Containers\AccTaxCode\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccTaxCodeRepository
 */
class AccTaxCodeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'code' => 'like',
'user_id' => '=',
'label' => 'like',
'tax_rate' => '=',
'invoice_title' => 'like',
'credit_note_title' => 'like',
'balance_sheet_account_id' => '=',
'custome_type' => 'like',
'rate' => '=',
'reverse_charged' => 'like',
'status' => '=',
'net_reporting_category_id' => '=',
'net_reporting_category_reversed_id' => '=',
'amount_reporting_category_reversed_id' => '=',
'amount_reporting_category_id' => '=',

    ];

}
