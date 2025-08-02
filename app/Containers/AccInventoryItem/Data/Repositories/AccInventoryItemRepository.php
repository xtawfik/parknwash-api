<?php

namespace App\Containers\AccInventoryItem\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInventoryItemRepository
 */
class AccInventoryItemRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'code' => 'like',
'name_en' => 'like',
'name_ar' => 'like',
'unit_name_en' => 'like',
'unit_name_ar' => 'like',
'division_id' => '=',
'place_id' => '=',
'divison_place_id' => '=',
'control_account_id' => '=',
'production_stage' => 'like',
'quantity_desired' => 'like',
'receive' => 'like',
'deliver' => 'like',
'income_account_id' => '=',
'expense_account_id' => '=',
'description_en' => 'like',
'description_ar' => 'like',
'purchase_price' => 'like',
'unit_price' => 'like',
'sales_division_id' => '=',
'sales_place_id' => '=',
'sales_division_place_id' => '=',
'tax_code_id' => '=',
'hide_name' => '=',
'average_cost' => 'like',
'total_quantity' => 'like',
'quantity_on_hand' => 'like',
'quantity_to_deliver' => 'like',
'quantity_available' => 'like',
'quantity_to_receive' => 'like',
'quantity_be_available' => 'like',
'quantity_to_order' => 'like',
'obsolete_quantity_to_receive' => 'like',
'obsolete_quantity_to_deliver' => 'like',
'obsolete_quantity_on_hand' => 'like',
'quantity_owned' => 'like',
'total_cost' => 'like',
'user_id' => '=',
'status' => '=',
'sales_price' => 'like',

    ];

}
