<?php

namespace App\Containers\AccEmployee\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccEmployeeRepository
 */
class AccEmployeeRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'user_id' => '=',
'employee_id' => '=',
'currency_id' => '=',
'division_id' => '=',
'division_place_id' => '=',
'place_id' => '=',
'control_account_id' => '=',
'address' => 'like',
'starting_balance_type' => 'like',
'starting_balance' => 'like',
'status' => '=',

    ];

}
