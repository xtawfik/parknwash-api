<?php

namespace App\Containers\AccSupplier\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AccSupplierRepository
 */
class AccSupplierRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'code' => 'like',
'email' => 'like',
'credit_limit' => 'like',
'currency_id' => '=',
'address' => 'like',
'division_id' => '=',
'division_place_id' => '=',
'place_id' => '=',
'control_account_id' => '=',
'available_credit' => 'like',
'status' => '=',
'account_payable' => '=',
'money_status' => '=',
'user_id' => '=',
'accounts_payable' => '=',

    ];

}
