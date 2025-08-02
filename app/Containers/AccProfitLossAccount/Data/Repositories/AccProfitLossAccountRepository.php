<?php

namespace App\Containers\AccProfitLossAccount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccProfitLossAccountRepository
 */
class AccProfitLossAccountRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'name' => 'like',
'code' => 'like',
'profit_loss_id' => '=',
'cash_flow_type_id' => '=',
'cash_flow_id' => '=',
'description' => 'like',
'status' => '=',
'division_id' => '=',
'place_id' => '=',
'division_place_id' => '=',
'account_category_id' => '=',
'tax_code_id' => '=',

    ];

}
