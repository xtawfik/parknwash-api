<?php

namespace App\Containers\AccProductionCost\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccProductionCostRepository
 */
class AccProductionCostRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'balance_sheet_account_id' => '=',
'profit_loss_accoun_id' => '=',
'amount' => 'like',
'production_order_id' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'user_id' => '=',

    ];

}
