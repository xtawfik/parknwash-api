<?php

namespace App\Containers\AccInventoryWriteOff\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccInventoryWriteOffRepository
 */
class AccInventoryWriteOffRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'date' => '=',
'reference' => 'like',
'description' => 'like',
'inventory_id' => '=',
'balance_sheet_account_id' => '=',
'profit_loss_account_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'project_id' => '=',
'total' => 'like',
'user_id' => '=',
'tax_code_id' => '=',

    ];

}
