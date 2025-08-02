<?php

namespace App\Containers\AccBalanceSheetAccount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccBalanceSheetAccountRepository
 */
class AccBalanceSheetAccountRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'name' => 'like',
'code' => 'like',
'balance_sheet_id' => '=',
'cash_flow_type_id' => '=',
'cash_flow_id' => '=',
'division_place_id' => '=',
'division_id' => '=',
'place_id' => '=',
'starting_balance' => 'like',
'balance_type' => 'like',
'description' => 'like',
'balance' => 'like',
'status' => '=',
'account_category_id' => '=',
'tax_code_id' => '=',

    ];

}
