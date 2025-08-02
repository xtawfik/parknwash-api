<?php

namespace App\Containers\AccNonInventoryItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccNonInventoryItemRepository
 */
class AccNonInventoryItemRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'name_ar' => 'like',
'name_en' => 'like',
'unit_name_en' => 'like',
'unit_name_ar' => 'like',
'sold_balance_sheet_account_id' => '=',
'purchased_balance_sheet_account_id' => '=',
'sold_profit_loss_account_id' => '=',
'purchased_profit_loss_account_id' => '=',
'description' => 'like',
'sales_price' => 'like',
'purchase_price' => 'like',
'tax_code_id' => '=',
'division_place_id' => '=',
'place_id' => '=',
'division_id' => '=',
'status' => '=',
'unit_price' => 'like',

    ];

}
