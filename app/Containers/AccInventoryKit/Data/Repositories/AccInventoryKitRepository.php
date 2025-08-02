<?php

namespace App\Containers\AccInventoryKit\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInventoryKitRepository
 */
class AccInventoryKitRepository extends Repository
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
'division_place_id' => '=',
'description' => 'like',
'sales_price' => 'like',
'sales_division_id' => '=',
'sales_division_place_id' => '=',
'sales_place_id' => '=',
'tax_code_id' => '=',
'income_account_id' => '=',
'user_id' => '=',
'status' => '=',
'unit_price' => 'like',

    ];

}
