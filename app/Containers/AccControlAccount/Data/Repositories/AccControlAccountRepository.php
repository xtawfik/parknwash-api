<?php

namespace App\Containers\AccControlAccount\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccControlAccountRepository
 */
class AccControlAccountRepository extends Repository
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
'control_type_id' => '=',
'cash_flow_type_id' => '=',
'cash_flow_id' => '=',
'status' => '=',
'account_category_id' => '=',

    ];

}
